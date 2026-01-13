<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    // Halaman daftar produk
    public function index()
    {
        // Pake 'with' biar query-nya efisien (Eager Loading)
        $products = Product::with('category')->latest()->get();
        return view('products.index', compact('products'));
    }

    // Halaman tambah produk
    public function create()
    {
        // Kirim data kategori buat dropdown pilihan
        $categories = Category::all();
        $suppliers = Supplier::all(); // Opsional
        return view('products.create', compact('categories', 'suppliers'));
    }

    // Proses simpan produk
    public function store(Request $request)
    {
        // Validasi input [cite: 35]
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil masuk gudang!');
    }

    // Halaman edit produk
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Proses update produk
    public function update(Request $request, Product $product)
    {
        // Validasi update [cite: 38]
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    // Hapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus dari stok!');
    }
}
