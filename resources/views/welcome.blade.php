@guest
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
<nav class="fixed w-full z-50 bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 md:px-8 flex justify-between items-center h-16">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-2xl font-bold text-indigo-600">MyBlog</a>

        <!-- Right Menu -->
        <div class="flex space-x-4">
            <a href="{{ route('login') }}" 
               class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700 transition">
               Login
            </a>
            <a href="{{ route('register') }}" 
               class="px-4 py-2 text-indigo-600 border border-indigo-600 rounded hover:bg-indigo-50 transition">
               Register
            </a>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section class="relative min-h-screen flex flex-col items-center justify-center text-center">
        <!-- Background -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1950&q=80" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-indigo-900 via-transparent to-indigo-900 opacity-80"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 text-white px-4">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 drop-shadow-lg">Welcome to MyBlog</h1>
            <p class="text-lg md:text-2xl mb-8 max-w-2xl mx-auto drop-shadow-md">
                Discover amazing blogs, share your thoughts, and connect with a community of readers worldwide.
            </p>
          
    </section>

</body>
</html>
@endguest
