<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Yeni Blog Ekle
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('blogs.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block">Başlık</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block">İçerik</label>
                        <textarea name="content" rows="5" class="w-full border rounded px-3 py-2" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block">Yazar</label>
                        <select name="author_id" class="w-full border rounded px-3 py-2" required>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block">Kategoriler</label>
                        @foreach ($categories as $cat)
                            <label class="inline-flex items-center mr-3">
                                <input type="checkbox" name="categories[]" value="{{ $cat->id }}">
                                <span class="ml-1">{{ $cat->name }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <label class="block">Durum</label>
                        <select name="status" class="w-full border rounded px-3 py-2" required>
                            <option value="aktif">Aktif</option>
                            <option value="pasif">Pasif</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
