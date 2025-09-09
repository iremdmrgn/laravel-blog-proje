<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blog Listesi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash mesaj --}}
            @if(session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-init="setTimeout(() => show = false, 3000)" 
                    class="bg-green-200 text-green-800 p-4 rounded mb-4"
                >
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('blogs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Yeni Blog Ekle</a>

                <table class="w-full mt-6 border">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Başlık</th>
                            <th class="border px-4 py-2">Yazar</th>
                            <th class="border px-4 py-2">Kategoriler</th>
                            <th class="border px-4 py-2">Durum</th>
                            <th class="border px-4 py-2">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td class="border px-4 py-2">{{ $blog->id }}</td>
                                <td class="border px-4 py-2">{{ $blog->title }}</td>
                                <td class="border px-4 py-2">{{ $blog->author->name ?? 'Yok' }}</td>
                                <td class="border px-4 py-2">
                                    @foreach ($blog->categories ?? [] as $cat)
                                        <span class="bg-gray-200 px-2 py-1 rounded">{{ $cat->name }}</span>
                                    @endforeach
                                </td>
                                <td class="border px-4 py-2">
                                    @if($blog->status == 1)
                                        <span class="text-green-600 font-bold">Aktif</span>
                                    @else
                                        <span class="text-red-600 font-bold">Pasif</span>
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="text-blue-500">Düzenle</a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
