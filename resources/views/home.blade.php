<x-app-layout>
    <div class="bg-blue-50 dark:bg-gray-900 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hoşgeldiniz Bölümü -->
            <section class="dark:bg-gray-800 rounded-2xl shadow-lg p-10 mb-12">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-4">Blog Dünyasına Hoşgeldiniz</h1>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Burada en güncel yazılarımızı keşfedebilir, öne çıkan blogları inceleyebilirsiniz.
                    </p>
                    <a href="{{ route('blogs.frontend') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-full shadow-md transition duration-300">
                        Blogları Gör
                    </a>
                </div>
            </section>

            <!-- Öne Çıkan Bloglar -->
            <section>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Öne Çıkan Bloglar</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($featuredBlogs as $blog)
                        <div class="dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">

                            <div class="p-5">
                                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">{{ $blog->title }}</h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">{!! $blog->content !!}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $blog->author->name ?? 'Bilinmiyor' }}</span>
                                    <a href="{{ route('blogs.frontend') }}" class="text-blue-500 hover:underline text-sm font-medium">Devamını Oku</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>

            <!-- Daha Fazla Keşfet Bölümü -->
            <section class="mt-12 bg-blue-500 dark:bg-blue-600 rounded-xl p-10 text-center text-white shadow-lg">
                <h2 class="text-3xl font-bold mb-4">Daha Fazla Keşfetmek İster Misiniz?</h2>
                <p class="mb-6">Tüm blogları incelemek ve güncel içeriklerden haberdar olmak için hemen tıklayın.</p>
                <a href="{{ route('blogs.frontend') }}" class="inline-block bg-white text-blue-500 font-semibold px-6 py-3 rounded-full shadow-md hover:bg-gray-100 transition duration-300">
                    Bloglara Git
                </a>
            </section>

        </div>
    </div>
</x-app-layout>
