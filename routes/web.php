<?php

use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Book;
use App\Models\BookCategory;

Route::get('/', function () {
    $menuCategories = MenuCategory::orderBy('name')->get();

    $featuredMenus = Menu::where('is_featured', true)
        ->orderByDesc('created_at')
        ->limit(6)
        ->get();

    // fallback kalau belum ada menu featured
    if ($featuredMenus->isEmpty()) {
        $featuredMenus = Menu::orderByDesc('created_at')->limit(6)->get();
    }

    $bookCategories = BookCategory::orderBy('name')->get();
    $topBooks = Book::orderByDesc('stock')
        ->limit(4)
        ->get();

    return view('landing', [
        'menuCategories' => $menuCategories,
        'menus' => $featuredMenus,
        'bookCategories' => $bookCategories,
        'topBooks' => $topBooks,
    ]);
});

Route::get('/welcome', function () {
    return view('welcome');
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


