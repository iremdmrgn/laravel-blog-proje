<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Sayfa içeriği --}}
    <main class="py-6">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 p-4 text-center text-gray-500">
        &copy; {{ date('Y') }} Tüm Hakları Saklıdır.
    </footer>

</body>
</html>
