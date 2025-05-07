<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Hamcrest\Core\AllOf;
use RealRashid\SweetAlert\Facades\Alert;


class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function user()
    {
        $users = User::all();
        return view('user.table', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Book;

        $data->judulbuku = $request->judulbuku;
        $data->penulis = $request->penulis;
        $data->publisher = $request->publisher;
        $data->tahunterbit = $request->tahunterbit;
        $data->jumlahhalaman = $request->jumlahhalaman;
        $data->deskripsi = $request->deskripsi;
        $data->kategori = $request->kategori;

        // INI BUAT COVEEER
        $lastCover = Book::where('coverbuku', 'like', 'cover%.%')
            ->orderByDesc('id')
            ->first();
        $lastNumber = 0;
        if ($lastCover && preg_match('/cover(\d+)\./', $lastCover->coverbuku, $matches)) {
            $lastNumber = (int)$matches[1];
        }
        $newNumber = $lastNumber + 1;
        $extension = $request->file('coverbuku')->getClientOriginalExtension();
        $filename = 'cover' . $newNumber . '.' . $extension;
        $savecover = 'covers/' . $filename;
        $request->file('coverbuku')->storeAs('covers', $filename, 'public');

        $data->coverbuku = $savecover;
        
        // CREATE DATA KE DB
        $data->save();


        $tahun = date('Y');
        $request->validate([
            'tahunterbit' => "required|integer|between:1000,$tahun",
        ]);


        // SWEETALERT
        Alert::success('Berhasil', 'Anda berhasil menambahkan buku baru');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function userbook(string $id)
    {
        // dd($id);
        $book = Book::findOrFail($id);
        return view('user.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Book::find($id);
        return view('books.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Book::findOrFail($id);
        $data->judulbuku = $request->judulbuku;
        $data->penulis = $request->penulis;
        $data->publisher = $request->penerbit;
        $data->tahunterbit = $request->tahunterbit;
        $data->jumlahhalaman = $request->jumlahhalaman;
        $data->deskripsi = $request->deskripsi;


        if ($request->hasFile('coverbuku')) {
            if ($data->coverbuku && Storage::disk('public')->exists('covers/' . $data->coverbuku)) {
                Storage::disk('public')->delete('covers/' . $data->coverbuku);
            }
            $lastCover = Book::where('coverbuku', 'like', 'cover%.%')
                ->orderByDesc('id')
                ->first();

            $lastNumber = 0;
            if ($lastCover && preg_match('/cover(\d+)\./', $lastCover->coverbuku, $matches)) {
                $lastNumber = (int) $matches[1];
            }
            $newNumber = $lastNumber + 1;
            $extension = $request->file('coverbuku')->getClientOriginalExtension();
            $filename = 'cover' . $newNumber . '.' . $extension;
            $request->file('coverbuku')->storeAs('covers', $filename, 'public');
            $savecover = 'covers/' . $filename;
            $data->coverbuku = $savecover;
        }

        $tahunSekarang = date('Y');

        $request->validate([
            'tahunterbit' => "required|integer|between:1000,$tahunSekarang",
            'coverbuku' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data->save();

        Alert::success('Berhasil', 'Berhasil mengedit buku');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Book::findOrFail($id);

        if ($data->coverbuku && Storage::disk('public')->exists($data->coverbuku)) {
            Storage::disk('public')->delete($data->coverbuku);
        }
        $data->delete();   
        
        Alert::success('Berhasil', 'Anda berhasil menghapus buku');
        return redirect()->route('books.index');
    }

    public function destroyuser(string $id)
    {
        $data = User::findOrFail($id);

        $data->delete();   
        
        Alert::success('Berhasil', 'Anda berhasil menghapus user');
        return redirect()->route('user');
    }
}
