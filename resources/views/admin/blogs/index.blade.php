<x-app-layout>
    <div class="container p-6">
        <h1 class="text-2xl font-bold mb-6">Blog Listesi</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('blogs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Yeni Blog Ekle</a>

        @if($blogs->isEmpty())
            <p>Henüz blog bulunmamaktadır.</p>
        @else
            @foreach($blogs as $blog)
                <div class="bg-gray-100 p-4 rounded shadow mb-4">
                    <h2 class="font-semibold mb-2">{{ $blog->title }}</h2>
                    <p>{!! $blog->content !!}</p>
                    <p><strong>Yazar:</strong> {{ $blog->author->name ?? 'Bilinmiyor' }}</p>
                    <p><strong>Kategoriler:</strong> {{ $blog->categories->pluck('name')->join(', ') }}</p>
                    <p><strong>Durum:</strong> 
                        @if($blog->status === 'aktif')
                            <span class="text-green-600 font-bold">Aktif</span>
                        @else
                            <span class="text-red-600 font-bold">Pasif</span>
                        @endif
                    </p>
                    <div class="mt-2">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="text-blue-600 mr-2">Düzenle</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Sil</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
