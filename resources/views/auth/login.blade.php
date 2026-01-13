<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GudangKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden m-4">
        <!-- Header -->
        <div class="px-8 py-10 text-center bg-gradient-to-br from-blue-600 to-indigo-700">
            <h1 class="text-3xl font-bold text-white mb-2">GudangKu 📦</h1>
            <p class="text-blue-100 text-sm">Masuk untuk mengelola inventarismu.</p>
        </div>

        <!-- Form -->
        <div class="p-8">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all placeholder-slate-400"
                        placeholder="contoh@gudangku.com" required autofocus>
                    @error('email')
                        <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all placeholder-slate-400"
                        placeholder="••••••••" required>
                </div>

                <button type="submit"
                    class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-200">
                    Masuk Sekarang
                </button>
            </form>
        </div>

        <div class="bg-slate-50 px-8 py-4 text-center border-t border-slate-100">
            <p class="text-xs text-slate-400">&copy; {{ date('Y') }} GudangKu. Protected System.</p>
        </div>
    </div>

</body>

</html>