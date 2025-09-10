<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-6">
        <h1 class="text-2xl font-bold mb-8">Admin Paneli</h1>
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('blogs.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Bloglar</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <header class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">@yield('header')</h2>
        </header>

        <main>
            @yield('content')
        </main>
    </div>

</body>
</html>
