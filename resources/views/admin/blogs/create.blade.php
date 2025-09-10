@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px; max-width:700px; margin:auto;">
    <h1 style="text-align:center; margin-bottom:30px;">Yeni Blog Ekle</h1>

    <form action="{{ route('blogs.store') }}" method="POST" style="background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
        @csrf

        <div style="margin-bottom:15px;">
            <label><strong>Başlık</strong></label>
            <input type="text" name="title" class="form-control" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>İçerik</strong></label>
            <textarea name="content" rows="5" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required></textarea>
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>Yazar</strong></label>
            <select name="author_id" class="form-control" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>Kategoriler</strong></label><br>
            @foreach ($categories as $cat)
                <label style="margin-right:10px;">
                    <input type="checkbox" name="categories[]" value="{{ $cat->id }}"> {{ $cat->name }}
                </label>
            @endforeach
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>Durum</strong></label>
            <select name="status" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
                <option value="aktif">Aktif</option>
                <option value="pasif">Pasif</option>
            </select>
        </div>

        <button type="submit" style="background:#007bff; color:#fff; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">Kaydet</button>
    </form>
</div>
@endsection
