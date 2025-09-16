<x-app-layout>
    <div class="container max-w-xl mx-auto p-6">
        <h1 class="text-center text-2xl font-bold mb-6">Yeni Blog Ekle</h1>

        <form action="{{ route('blogs.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="font-semibold block mb-1">Başlık</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="font-semibold block mb-1">İçerik</label>
                <textarea name="content" rows="5" class="w-full border rounded px-3 py-2" required></textarea>
            </div>

            <div class="mb-4">
                <label class="font-semibold block mb-1">Yazar</label>
                <select name="author_id" class="w-full border rounded px-3 py-2" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="font-semibold block mb-1">Kategoriler</label><br>
                @foreach ($categories as $cat)
                    <label class="mr-4">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}"> {{ $cat->name }}
                    </label>
                @endforeach
            </div>

            <div class="mb-4">
                <label class="font-semibold block mb-1">Durum</label>
                <select name="status" class="w-full border rounded px-3 py-2" required>
                    <option value="aktif">Aktif</option>
                    <option value="pasif">Pasif</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kaydet</button>
        </form>
    </div>
</x-app-layout>
