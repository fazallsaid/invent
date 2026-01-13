<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    // Menampilkan daftar kategori [cite: 43]
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    // Form tambah kategori [cite: 44]
    public function create()
    {
        return view('categories.create');
    }

    // Simpan data ke database (Create)
    public function store(Request $request)
    {
        // Validasi wajib ada [cite: 35]
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:categories,code|max:10',
            'description' => 'nullable|string'
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Form edit kategori
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update data (Update)
    public function update(Request $request, Category $category)
    {
        // Validasi ubah data [cite: 38]
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:categories,code,' . $category->id,
            'description' => 'nullable|string'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diupdate!');
    }

    // Hapus data (Delete)
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
