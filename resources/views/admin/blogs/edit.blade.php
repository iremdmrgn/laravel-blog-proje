@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px; max-width:700px; margin:auto;">
    <h1 style="text-align:center; margin-bottom:30px;">Blog Düzenle</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" style="background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')

        <div style="margin-bottom:15px;">
            <label><strong>Başlık</strong></label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>İçerik</strong></label>
            <textarea name="content" rows="5" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>Yazar</strong></label>
            <select name="author_id" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ $blog->author_id == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>Kategoriler</strong></label><br>
            @foreach ($categories as $cat)
                <label style="margin-right:10px;">
                    <input type="checkbox" name="categories[]" value="{{ $cat->id }}" {{ $blog->categories->contains($cat->id) ? 'checked' : '' }}>
                    {{ $cat->name }}
                </label>
            @endforeach
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>Durum</strong></label>
            <select name="status" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
                <option value="aktif" {{ $blog->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="pasif" {{ $blog->status == 'pasif' ? 'selected' : '' }}>Pasif</option>
            </select>
        </div>

        <button type="submit" style="background:#28a745; color:#fff; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">Güncelle</button>
    </form>
</div>
@endsection
