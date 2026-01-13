@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden">
        <!-- Decorative blobs -->
        <div
            class="absolute -top-40 -right-40 w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
        </div>
        <div
            class="absolute -bottom-40 -left-40 w-96 h-96 bg-brand-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute top-20 left-20 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000">
        </div>

        <div class="relative pt-10 pb-20 lg:pt-20 lg:pb-28">
            <div class="text-center max-w-4xl mx-auto">
                <div
                    class="inline-flex items-center justify-center p-1 px-3 py-1 mb-8 text-sm font-medium text-brand-700 bg-brand-100 rounded-full shadow-sm hover:bg-brand-200 transition-colors">
                    <span class="w-2 h-2 mr-2 bg-brand-500 rounded-full animate-pulse"></span>
                    Sistem Inventaris Modern
                </div>

                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-slate-900 mb-8 leading-tight">
                    Kelola Gudang jadi <br>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-brand-600 to-indigo-600">Lebih
                        Menyenangkan.</span>
                </h1>

                <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-500 mb-10">
                    Lupakan tampilan lama yang membosankan. Kelola stok produk dan kategori dengan antarmuka yang bersih,
                    cepat, dan memanjakan mata.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-brand-600 rounded-2xl shadow-lg shadow-brand-500/30 hover:bg-brand-700 hover:shadow-brand-500/50 transform hover:-translate-y-1 transition-all duration-200">
                        Lihat Produk
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="{{ route('categories.index') }}"
                        class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-slate-700 bg-white border border-slate-200 rounded-2xl shadow-sm hover:bg-slate-50 hover:text-brand-600 transition-all duration-200">
                        Kelola Kategori
                    </a>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white/60 backdrop-blur-sm p-8 rounded-3xl border border-white/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-300 group">
                    <div
                        class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Manajemen Stok</h3>
                    <p class="text-slate-500 leading-relaxed">Pantau jumlah barang dengan mudah. Update stok otomatis saat
                        barang masuk atau keluar.</p>
                </div>

                <div
                    class="bg-white/60 backdrop-blur-sm p-8 rounded-3xl border border-white/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-300 group">
                    <div
                        class="w-14 h-14 bg-pink-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Kategori Rapi</h3>
                    <p class="text-slate-500 leading-relaxed">Kelompokkan barangmu biar ga pusing carinya. Organisasi yang
                        baik kunci gudang rapi.</p>
                </div>

                <div
                    class="bg-white/60 backdrop-blur-sm p-8 rounded-3xl border border-white/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-300 group">
                    <div
                        class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Super Cepat</h3>
                    <p class="text-slate-500 leading-relaxed">Dibangun dengan teknologi modern biar loadingnya wuzz-wuzz, ga
                        pake lama.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
@endsection