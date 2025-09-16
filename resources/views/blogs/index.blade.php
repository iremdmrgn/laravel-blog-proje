<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bloglar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if($blogs->isEmpty())
                <p class="text-center">Henüz blog bulunmamaktadır.</p>
            @else
                @foreach($blogs as $blog)
                    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm p-6 mb-6">
                        <h2 class="text-2xl font-semibold mb-2">{{ $blog->title }}</h2>
                        
                        <div class="mb-4">
                            {!! $blog->content !!}
                        </div>
                        
                        <p><strong>Yazar:</strong> {{ $blog->author->name ?? 'Bilinmiyor' }}</p>
                        <p><strong>Kategoriler:</strong>
                            @foreach($blog->categories as $category)
                                {{ $category->name }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</x-app-layout>
