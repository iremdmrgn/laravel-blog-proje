<x-app-layout>
    <div class="container max-w-xl mx-auto p-6">
        <h1 class="text-center text-2xl font-bold mb-6">Blog Düzenle</h1>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="font-semibold block mb-1">Başlık</label>
                <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="font-semibold block mb-1">İçerik</label>
                <textarea name="content" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('content', $blog->content) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="font-semibold block mb-1">Yazar</label>
                <select name="author_id" class="w-full border rounded px-3 py-2" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $blog->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="font-semibold block mb-1">Kategoriler</label><br>
                @foreach ($categories as $cat)
                    <label class="mr-4">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}" {{ $blog->categories->contains($cat->id) ? 'checked' : '' }}>
                        {{ $cat->name }}
                    </label>
                @endforeach
            </div>

            <div class="mb-4">
                <label class="font-semibold block mb-1">Durum</label>
                <select name="status" class="w-full border rounded px-3 py-2" required>
                    <option value="aktif" {{ $blog->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="pasif" {{ $blog->status == 'pasif' ? 'selected' : '' }}>Pasif</option>
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Güncelle</button>
        </form>
    </div>
</x-app-layout>
