<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    private function ensureAdmin(Request $request): void
    {
        $user = $request->user();
        if (! $user || $user->role !== 'admin') {
            abort(403);
        }
    }

    public function index(Request $request)
    {
        $this->ensureAdmin($request);

        $books = Book::with('category')->orderByDesc('id')->paginate(20);
        return view('admin.books.index', compact('books'));
    }

    public function create(Request $request)
    {
        $this->ensureAdmin($request);

        $categories = BookCategory::orderBy('name')->get();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->ensureAdmin($request);

        $data = $request->validate([
            'category_id' => ['nullable', 'exists:book_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'author' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
            'cover' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:4096'],


        ]);



        // Simpan file cover (bukan URL)
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('book_covers', 'public');
        } elseif (empty($data['cover'])) {
            unset($data['cover']);
        }

        Book::create($data);


        return redirect()->route('admin.books.index')->with('success', 'Book created');
    }

    public function edit(Request $request, Book $book)
    {
        $this->ensureAdmin($request);

        $categories = BookCategory::orderBy('name')->get();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $this->ensureAdmin($request);

        $data = $request->validate([
            'category_id' => ['nullable', 'exists:book_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'author' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
            'cover' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:4096'],

        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('book_covers', 'public');
        } else {
            unset($data['cover']);
        }

        $book->update($data);
        return redirect()->route('admin.books.index')->with('success', 'Book updated');
    }

    public function destroy(Request $request, Book $book)
    {
        $this->ensureAdmin($request);

        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted');
    }
}

