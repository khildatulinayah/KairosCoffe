<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing');
});

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Authentication
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

