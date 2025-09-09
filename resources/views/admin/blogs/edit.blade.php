<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog Düzenle</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Başlık</label>
                        <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label>İçerik</label>
                        <textarea name="content" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('content', $blog->content) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label>Yazar</label>
                        <select name="author_id" class="w-full border rounded px-3 py-2" required>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ $blog->author_id == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Kategoriler</label>
                        @foreach ($categories as $cat)
                            <label class="inline-flex items-center mr-3">
                                <input type="checkbox" name="categories[]" value="{{ $cat->id }}"
                                    {{ $blog->categories->contains($cat->id) ? 'checked' : '' }}>
                                <span class="ml-1">{{ $cat->name }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <label>Durum</label>
<select name="status" class="w-full border rounded px-3 py-2" required>
    <option value="aktif" {{ $blog->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
    <option value="pasif" {{ $blog->status == 'pasif' ? 'selected' : '' }}>Pasif</option>
</select>


                    </div>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
