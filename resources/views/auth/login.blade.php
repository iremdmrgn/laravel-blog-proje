<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giriş Yap</title>

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700">

    <div class="w-full max-w-md p-8 bg-white dark:bg-gray-900 rounded-3xl shadow-2xl">
        <h2 class="text-3xl font-extrabold text-center text-gray-800 dark:text-gray-100 mb-6">
            Giriş Yap
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- E-Posta -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('E-Posta')" />
                <x-text-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Şifre -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Şifre')" />
                <x-text-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Beni Hatırla -->
            <div class="mb-4 flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <label for="remember_me" class="ml-2 block text-sm text-gray-600 dark:text-gray-400">Beni Hatırla</label>
            </div>

            <!-- Giriş Yap Butonu -->
            <div class="flex items-center justify-between mb-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300" href="{{ route('password.request') }}">
                        Şifremi Unuttum
                    </a>
                @endif

                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 w-32 text-center">
                    Giriş Yap
                </x-primary-button>
            </div>

            <!-- Kayıt Linki -->
            @if (Route::has('register'))
                <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                    Hesabınız yok mu?
                    <a href="{{ route('register') }}" class="underline text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                        Kayıt Ol
                    </a>
                </p>
            @endif
        </form>
    </div>

</body>
</html>
