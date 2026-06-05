<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenusController extends Controller
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

        $menus = Menu::with('category')->orderByDesc('id')->paginate(20);
        return view('admin.menus.index', compact('menus'));
    }

    public function create(Request $request)
    {
        $this->ensureAdmin($request);

        $categories = MenuCategory::orderBy('name')->get();
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->ensureAdmin($request);

        $data = $request->validate([
            'category_id' => ['nullable', 'exists:menu_categories,id'],
            'name' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['is_featured'] = (bool) ($request->input('is_featured') ?? false);

        Menu::create($data);
        return redirect()->route('admin.menus.index')->with('success', 'Menu created');
    }

    public function edit(Request $request, Menu $menu)
    {
        $this->ensureAdmin($request);

        $categories = MenuCategory::orderBy('name')->get();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        $this->ensureAdmin($request);

        $data = $request->validate([
            'category_id' => ['nullable', 'exists:menu_categories,id'],
            'name' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['is_featured'] = (bool) ($request->input('is_featured') ?? false);

        $menu->update($data);
        return redirect()->route('admin.menus.index')->with('success', 'Menu updated');
    }

    public function destroy(Request $request, Menu $menu)
    {
        $this->ensureAdmin($request);

        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu deleted');
    }
}

