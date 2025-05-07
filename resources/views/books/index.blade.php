@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-sm mt-[100px]">
        <div class="p-6 border-b border-gray-200 flex justify-between w-full">
            <h2 class="text-lg font-medium">Daftar Buku</h2>
            <a href="{{ route('books.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md flex items-center gap-2 hover:bg-indigo-700">
                <i class="fa fa-plus-circle text-sm"></i>
                <span>Tambah Buku</span>
            </a>
        </div>
        @if (session('success'))
            <div id="notif-box" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="p-6">
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="text-center">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Judul</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Penulis</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Penerbit</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tahun Terbit</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @foreach ($books as $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $book->judulbuku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $book->penulis }}</td>
                                <td class="px-6 py-4 max-w-xs truncate">{{ $book->publisher }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $book->tahunterbit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('books.show', $book->id) }}"
                                            class="px-3 py-1 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Lihat</a>
                                        <a href="{{ route('books.edit', $book->id) }}"
                                            class="px-3 py-1 text-sm border border-gray-300 rounded-md hover:bg-gray-50">Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-sm bg-red-50 text-red-700 border border-red-300 rounded-md hover:bg-red-100">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
