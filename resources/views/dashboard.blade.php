@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Welcome Section -->
        <div
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-brand-600 to-indigo-600 p-8 text-white shadow-2xl shadow-brand-500/30">
            <div class="relative z-10">
                <h1 class="text-3xl font-bold mb-2">Selamat Datang di GudangKu! 👋</h1>
                <p class="text-brand-100 max-w-xl text-lg">Kelola inventaris produk dan kategorimu dengan mudah, cepat, dan
                    estetik. Semangat kerjanya ya!</p>
            </div>

            <!-- Decorative blobs -->
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-20 w-40 h-40 bg-indigo-500/30 rounded-full blur-2xl"></div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Products -->
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-shadow duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="p-3 bg-brand-50 text-brand-600 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-xs font-semibold text-emerald-500 bg-emerald-50 px-2.5 py-1 rounded-full">+Active</span>
                </div>
                <h3 class="text-3xl font-bold text-slate-800 mb-1">{{ $totalProducts }}</h3>
                <p class="text-slate-500 text-sm font-medium">Total Produk</p>
            </div>

            <!-- Total Categories -->
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-shadow duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="p-3 bg-purple-50 text-purple-600 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-purple-500 bg-purple-50 px-2.5 py-1 rounded-full">Types</span>
                </div>
                <h3 class="text-3xl font-bold text-slate-800 mb-1">{{ $totalCategories }}</h3>
                <p class="text-slate-500 text-sm font-medium">Total Kategori</p>
            </div>

            <!-- Low Stock -->
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-shadow duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="p-3 bg-rose-50 text-rose-600 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-rose-500 bg-rose-50 px-2.5 py-1 rounded-full">Urgent</span>
                </div>
                <h3 class="text-3xl font-bold text-slate-800 mb-1">{{ $lowStockProducts->count() }}</h3>
                <p class="text-slate-500 text-sm font-medium">Stok Menipis</p>
            </div>
        </div>

        <!-- Low Stock Alert Section -->
        @if($lowStockProducts->count() > 0)
            <div class="bg-white rounded-2xl border border-rose-100 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-rose-50 bg-rose-50/30 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
                        Perlu Restock Segera
                    </h3>
                    <a href="{{ route('products.index') }}"
                        class="text-sm font-semibold text-rose-600 hover:text-rose-700">Lihat Semua &rarr;</a>
                </div>
                <div class="divide-y divide-slate-50">
                    @foreach($lowStockProducts->take(5) as $product)
                        <div class="px-6 py-4 flex items-center justify-between hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center font-bold text-xs">
                                    {{ $product->stock }}
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">{{ $product->name }}</h4>
                                    <p class="text-xs text-slate-500">{{ $product->category->name ?? 'Uncategorized' }}</p>
                                </div>
                            </div>
                            @can('update', $product)
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="p-2 text-slate-400 hover:text-brand-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </a>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection