<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BooksPublicController extends Controller
{
    public function indexByCategory(BookCategory $bookCategory)
    {
        $books = Book::where('category_id', $bookCategory->id)
            ->orderByDesc('id')
            ->paginate(20);

        return view('books.index', [
            'bookCategory' => $bookCategory,
            'books' => $books,
        ]);
    }
}

