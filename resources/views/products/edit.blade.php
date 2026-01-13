@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm text-slate-500">
        <a href="{{ route('products.index') }}" class="hover:text-brand-600 transition-colors">Produk</a>
        <span class="mx-2">/</span>
        <span class="text-slate-800 font-medium">Edit Produk</span>
    </nav>

    <div class="bg-white/80 backdrop-blur-xl rounded-2xl border border-white/20 shadow-xl shadow-slate-200/50 p-8">
        <h2 class="text-2xl font-bold mb-1 text-slate-800">Edit Produk</h2>
        <p class="text-sm text-slate-500 mb-8">Perbarui informasi produk di sini.</p>
        
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Category Select -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori</label>
                <div class="relative">
                    <select name="category_id" class="w-full bg-white border border-slate-200 text-slate-700 rounded-xl py-3 px-4 leading-tight focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition-all duration-200 appearance-none cursor-pointer" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Product Name -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition-all duration-200" required>
            </div>

            <!-- Price & Stock Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Harga (Rp)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 font-medium">Rp</span>
                        <input type="number" name="price" value="{{ $product->price }}" class="w-full pl-12 bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition-all duration-200" min="0" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Stok</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition-all duration-200" min="0" required>
                </div>
            </div>

            <!-- Actions -->
            <div class="pt-6 flex items-center justify-end gap-4 border-t border-slate-100 mt-8">
                <a href="{{ route('products.index') }}" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-slate-800 hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-emerald-500/30 transition-all duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-emerald-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection