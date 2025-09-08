<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bloglar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @foreach ($blogs as $blog)
                    <div class="border-b border-gray-200 mb-4 pb-4">
                        <h3 class="text-lg font-bold">{{ $blog->title }}</h3>
                        <p class="text-sm text-gray-600">Yazar: {{ $blog->author->name ?? 'Bilinmiyor' }}</p>
                        <p class="mt-2">{{ $blog->content }}</p>
                        <p class="mt-1 text-gray-500">
                            Kategoriler: 
                            @foreach ($blog->categories as $cat)
                                <span class="bg-gray-200 px-2 py-1 rounded">{{ $cat->name }}</span>
                            @endforeach
                        </p>
                        <p class="mt-1">Durum: {{ $blog->status == 1 ? 'Aktif' : 'Pasif' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
