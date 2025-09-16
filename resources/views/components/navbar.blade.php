<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-6">
            <a href="{{ url('/') }}" class="font-bold text-lg text-gray-800 dark:text-gray-200">BlogSite</a>
            <a href="{{ url('/') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Ana Sayfa</a>
            <a href="{{ route('blogs.frontend') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Bloglar</a>
            <a href="{{ route('contact.show') }}" class="text-gray-700 dark:text-gray-300 hover:underline">İletişim</a>
        </div>

        <div class="flex items-center space-x-4">
            @auth
                <div class="relative">
                    <button class="text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</button>
                    <div class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-700 border rounded shadow-md hidden group-hover:block">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Çıkış</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Giriş</a>
                <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Kayıt Ol</a>
            @endauth
        </div>
    </div>
</nav>
