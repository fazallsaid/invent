@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-6 text-sm text-slate-500">
            <a href="{{ route('categories.index') }}" class="hover:text-brand-600 transition-colors">Kategori</a>
            <span class="mx-2">/</span>
            <span class="text-slate-800 font-medium">Tambah Baru</span>
        </nav>

        <div class="bg-white/80 backdrop-blur-xl rounded-2xl border border-white/20 shadow-xl shadow-slate-200/50 p-8">
            <h2 class="text-2xl font-bold mb-1 text-slate-800">Buat Kategori Baru</h2>
            <p class="text-sm text-slate-500 mb-8">Tambahkan kategori untuk mengelompokkan produk.</p>

            <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Category Name -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Kategori</label>
                    <input type="text" name="name"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition-all duration-200 placeholder-slate-400"
                        placeholder="Contoh: Elektronik" required>
                </div>

                <!-- Category Code -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kode Kategori</label>
                    <input type="text" name="code"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition-all duration-200 placeholder-slate-400"
                        placeholder="Contoh: ELK-001" required>
                    <p class="text-xs text-slate-400 mt-2">Gunakan kode unik untuk identifikasi.</p>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                    <textarea name="description"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 leading-tight focus:outline-none focus:bg-white focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition-all duration-200 h-24 placeholder-slate-400"
                        placeholder="Deskripsi singkat kategori ini..."></textarea>
                </div>

                <!-- Actions -->
                <div class="pt-6 flex items-center justify-end gap-4 border-t border-slate-100 mt-8">
                    <a href="{{ route('categories.index') }}"
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-slate-800 hover:bg-slate-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-brand-500/30 transition-all duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-brand-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection