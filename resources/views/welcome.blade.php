<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 md:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">MyBlog</a>
                </div>
                <!-- Auth buttons -->
                <div class="flex space-x-4">
                    @guest
                        <!-- Kullanıcı login değilse -->
                        <a href="{{ route('login') }}" 
                           class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="px-4 py-2 text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-50 transition">
                            Register
                        </a>
                    @else
                        <!-- Kullanıcı login ise -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700 transition">
                                Logout
                            </button>
                        </form>
                        <a href="{{ route('profile.edit') }}" 
                           class="px-4 py-2 text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-50 transition">
                            Profile
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex flex-col items-center justify-center text-white text-center pt-16">
        <!-- Arka plan resmi + overlay -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1950&q=80" 
                 alt="Background" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-600 opacity-70"></div>
        </div>

        <!-- İçerik -->
        <div class="relative z-10">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6">Welcome to MyBlog</h1>
            <p class="text-lg md:text-xl mb-8 max-w-xl mx-auto">
                Read, share, and connect with amazing blogs from around the world.
            </p>
            <div class="flex flex-col md:flex-row gap-6 justify-center">
            
            </div>
        </div>
    </section>

</body>
</html>
