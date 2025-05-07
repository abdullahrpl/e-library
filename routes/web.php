<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\bookController;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalbuku = Book::count();
    $totaluser = User::count();
    $books = Book::all();
    return view('dashboard.user', compact('totalbuku', 'books', 'totaluser'));
})->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        $totalbuku = Book::count();
        $totaluser = User::count();
        $books = Book::all();
        return view('dashboard.index', compact('totalbuku', 'books', 'totaluser'));
    })->name('dashboard');
    Route::resource('books', bookController::class);
    Route::get('/user', [bookController::class, 'user'])->name('user'); 
    Route::delete('/users/{id}', [bookController::class, 'destroy'])->name('books.destroyuser');
});

// Route::get('/admin_book', function () {
//     $totalbuku = Book::count();
//     $totaluser = User::count();
//     $books = Book::all();
//     return view('dashboard.index', compact('totalbuku', 'books', 'totaluser'));
// })->name('dashboard');

Route::middleware(['auth'])->group(function () {
   Route::get('/book/{id}', [BookController::class, 'userbook'])->name('userbook'); 
});

Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login.show');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'showRegister')->name('register.show');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});
