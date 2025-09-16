<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kayıt Ol</title>

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700">

    <div class="w-full max-w-md p-8 bg-white dark:bg-gray-900 rounded-3xl shadow-2xl">
        <h2 class="text-3xl font-extrabold text-center text-gray-800 dark:text-gray-100 mb-6">
            Kayıt Ol
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- İsim -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('İsim')" />
                <x-text-input id="name" class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- E-Posta -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('E-Posta')" />
                <x-text-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Şifre -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Şifre')" />
                <x-text-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Şifre Tekrar -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Şifre Tekrar')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Kayıt Butonu ve Login Linki -->
            <div class="flex items-center justify-between mt-4">
                <a class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300" href="{{ route('login') }}">
                    Zaten hesabım var
                </a>

                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 w-32 text-center">
                    Kayıt Ol
                </x-primary-button>
            </div>
        </form>
    </div>

</body>
</html>
