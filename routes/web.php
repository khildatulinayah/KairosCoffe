<?php

use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Book;
use App\Models\BookCategory;

Route::get('/', function () {
    // Landing page utama menggunakan resources/views/welcome.blade.php
    // Ambil data yang dibutuhkan oleh view (menu, kategori buku, top books)
    $menus = \App\Models\Menu::with('category')
        ->orderByDesc('id')
        ->take(6)
        ->get();

    $bookCategories = \App\Models\BookCategory::orderByDesc('id')->take(6)->get();

    // "Top books" di halaman ini memakai field: title, author, cover, category, stock, description
    $topBooks = \App\Models\Book::with('category')
        ->orderByDesc('stock')
        ->take(8)
        ->get();

    return view('welcome', compact('menus', 'bookCategories', 'topBooks'));
});

Route::get('/welcome', function () {
    $menus = \App\Models\Menu::with('category')
        ->orderByDesc('id')
        ->take(6)
        ->get();

    $bookCategories = \App\Models\BookCategory::orderByDesc('id')->take(6)->get();

    $topBooks = \App\Models\Book::with('category')
        ->orderByDesc('stock')
        ->take(8)
        ->get();

    return view('welcome', compact('menus', 'bookCategories', 'topBooks'));
});


Route::get('/landing', function () {
    return redirect('/');
});



use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Authentication
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public books by category
use App\Http\Controllers\BooksPublicController;

Route::get('/book-categories/{bookCategory}', [BooksPublicController::class, 'indexByCategory'])
    ->name('book-categories.show');

// Admin routes (CRUD)
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        $user = Auth::user();
        if (! $user || $user->role !== 'admin') {
            abort(403);
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('admin/books', \App\Http\Controllers\Admin\BooksController::class)->names('admin.books');
    Route::resource('admin/menus', \App\Http\Controllers\Admin\MenusController::class)->names('admin.menus');
    Route::resource('admin/book-categories', \App\Http\Controllers\Admin\BookCategoriesController::class)->names('admin.book_categories');
});


