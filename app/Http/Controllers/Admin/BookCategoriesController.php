<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoriesController extends Controller
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

        $categories = BookCategory::orderByDesc('id')->paginate(20);
        return view('admin.book_categories.index', compact('categories'));
    }

    public function create(Request $request)
    {
        $this->ensureAdmin($request);

        return view('admin.book_categories.create');
    }

    public function store(Request $request)
    {
        $this->ensureAdmin($request);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:book_categories,name'],
        ]);

        BookCategory::create($data);
        return redirect()->route('admin.book_categories.index')->with('success', 'Book category created');
    }

    public function edit(Request $request, BookCategory $bookCategory)
    {
        $this->ensureAdmin($request);

        return view('admin.book_categories.edit', compact('bookCategory'));
    }

    public function update(Request $request, BookCategory $bookCategory)
    {
        $this->ensureAdmin($request);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:book_categories,name,' . $bookCategory->id],
        ]);

        $bookCategory->update($data);
        return redirect()->route('admin.book_categories.index')->with('success', 'Book category updated');
    }

    public function destroy(Request $request, BookCategory $bookCategory)
    {
        $this->ensureAdmin($request);

        $bookCategory->delete();
        return redirect()->route('admin.book_categories.index')->with('success', 'Book category deleted');
    }
}

