@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Data Keluar Masuk</h1>
                <p class="text-slate-500 mt-1">Kelola stok masuk dan keluar secara real-time.</p>
            </div>
        </div>

        <!-- Input Section -->
        @can('create', App\Models\Product::class)
            <!-- Assuming functionality restricted to those who can manage products, or adjust policy later if needed -->
            <div class="bg-gradient-to-br from-white to-slate-50 rounded-3xl shadow-lg border border-slate-100 p-8">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-3">
                        <div class="p-2 bg-brand-100 rounded-xl text-brand-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        Catat Transaksi Baru
                    </h2>
                    <span class="text-xs font-semibold text-slate-400 bg-white px-3 py-1 rounded-full border border-slate-200">New Entry</span>
                </div>
                
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 text-emerald-700 rounded-2xl border border-emerald-100 flex items-center gap-3 shadow-sm">
                        <div class="p-2 bg-white rounded-full text-emerald-500 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 p-4 bg-rose-50 text-rose-700 rounded-2xl border border-rose-100 flex items-center gap-3 shadow-sm">
                        <div class="p-2 bg-white rounded-full text-rose-500 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                        <!-- Product Selection -->
                        <div class="md:col-span-12 lg:col-span-5">
                            <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">Produk</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-brand-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                </div>
                                <select name="product_id" required class="w-full pl-10 pr-4 py-3 rounded-2xl border-slate-200 focus:border-brand-500 focus:ring-brand-500 transition-shadow shadow-sm bg-white">
                                    <option value="">Pilih Produk...</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }} (Stok: {{ $product->stock }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Type Selection -->
                        <div class="md:col-span-6 lg:col-span-3">
                            <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">Tipe Transaksi</label>
                            <div class="relative">
                                <select name="type" required class="w-full pl-4 pr-10 py-3 rounded-2xl border-slate-200 focus:border-brand-500 focus:ring-brand-500 transition-shadow shadow-sm bg-white appearance-none">
                                    <option value="in">📥 Masuk (+)</option>
                                    <option value="out">📤 Keluar (-)</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
                                </div>
                            </div>
                        </div>

                        <!-- Date Selection -->
                        <div class="md:col-span-6 lg:col-span-4">
                            <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">Tanggal</label>
                            <input type="date" name="date" value="{{ date('Y-m-d') }}" required class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-brand-500 focus:ring-brand-500 transition-shadow shadow-sm text-slate-600">
                        </div>

                        <!-- Quantity -->
                        <div class="md:col-span-6 lg:col-span-3">
                            <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">Jumlah Item</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-brand-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
                                </div>
                                <input type="number" name="quantity" min="1" required class="w-full pl-10 pr-4 py-3 rounded-2xl border-slate-200 focus:border-brand-500 focus:ring-brand-500 transition-shadow shadow-sm font-medium" placeholder="0">
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="md:col-span-6 lg:col-span-9">
                            <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">Catatan <span class="text-slate-400 font-normal text-xs">(Opsional)</span></label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-brand-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </div>
                                <input type="text" name="notes" class="w-full pl-10 pr-4 py-3 rounded-2xl border-slate-200 focus:border-brand-500 focus:ring-brand-500 transition-shadow shadow-sm" placeholder="Contoh: Restock bulanan, Barang rusak, dll...">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="md:col-span-12 mt-2">
                            <button type="submit" class="w-full bg-gradient-to-r from-slate-800 to-slate-900 text-white font-bold py-4 rounded-2xl hover:shadow-xl hover:shadow-slate-500/20 active:scale-[0.99] transition-all duration-200 flex items-center justify-center gap-2 group">
                                <span class="group-hover:-translate-y-0.5 transition-transform">Simpan Transaksi</span>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endcan

        <!-- Tables Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Barang Masuk -->
            <div class="bg-white rounded-3xl shadow-sm border border-emerald-100 overflow-hidden">
                <div class="bg-emerald-50/50 px-6 py-4 border-b border-emerald-100">
                    <h3 class="font-bold text-emerald-800 flex items-center gap-2">
                        <span class="p-1.5 bg-emerald-100 rounded-lg">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </span>
                        Barang Masuk Terakhir
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <tbody class="divide-y divide-emerald-50">
                            @forelse($transactionsIn as $in)
                                <tr class="hover:bg-emerald-50/30 transition-colors">
                                    <td class="px-6 py-3">
                                        <p class="text-sm font-bold text-slate-700">{{ $in->product->name }}</p>
                                        <p class="text-xs text-slate-500">
                                            {{ \Carbon\Carbon::parse($in->date)->format('d M Y') }}</p>
                                    </td>
                                    <td class="px-6 py-3 text-right">
                                        <span class="text-sm font-bold text-emerald-600">+{{ $in->quantity }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-slate-400 text-sm">Belum ada data masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-2 border-t border-emerald-50">
                    {{ $transactionsIn->links() }}
                </div>
            </div>

            <!-- Barang Keluar -->
            <div class="bg-white rounded-3xl shadow-sm border border-rose-100 overflow-hidden">
                <div class="bg-rose-50/50 px-6 py-4 border-b border-rose-100">
                    <h3 class="font-bold text-rose-800 flex items-center gap-2">
                        <span class="p-1.5 bg-rose-100 rounded-lg">
                            <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                        </span>
                        Barang Keluar Terakhir
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <tbody class="divide-y divide-rose-50">
                            @forelse($transactionsOut as $out)
                                <tr class="hover:bg-rose-50/30 transition-colors">
                                    <td class="px-6 py-3">
                                        <p class="text-sm font-bold text-slate-700">{{ $out->product->name }}</p>
                                        <p class="text-xs text-slate-500">
                                            {{ \Carbon\Carbon::parse($out->date)->format('d M Y') }}</p>
                                    </td>
                                    <td class="px-6 py-3 text-right">
                                        <span class="text-sm font-bold text-rose-600">-{{ $out->quantity }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-slate-400 text-sm">Belum ada data keluar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-2 border-t border-rose-50">
                    {{ $transactionsOut->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection