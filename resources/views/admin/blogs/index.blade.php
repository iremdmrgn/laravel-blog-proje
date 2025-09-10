@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    <h1 style="text-align:center; margin-bottom:30px;">Blog Listesi</h1>

    @if(session('success'))
        <div style="background:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('blogs.create') }}" 
       style="display:inline-block; background:#007bff; color:#fff; padding:8px 15px; border-radius:5px; text-decoration:none; margin-bottom:20px;">
       Yeni Blog Ekle
    </a>

    @if($blogs->isEmpty())
        <p>Henüz blog bulunmamaktadır.</p>
    @else
        @foreach($blogs as $blog)
            <div class="blog-item" style="
                background-color:#f9f9f9; 
                color:#333; 
                border:1px solid #ccc; 
                padding:20px; 
                margin-bottom:20px; 
                border-radius:8px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            ">
                <h2 style="margin-bottom:10px;">{{ $blog->title }}</h2>
                <p>{!! $blog->content !!}</p>
                <p><strong>Yazar:</strong> {{ $blog->author->name ?? 'Bilinmiyor' }}</p>
                <p><strong>Kategoriler:</strong>
                    @foreach($blog->categories as $category)
                        {{ $category->name }}@if(!$loop->last), @endif
                    @endforeach
                </p>

                {{-- ✅ Status buraya eklendi --}}
                <p>
                    <strong>Durum:</strong> 
                    @if($blog->status === 'aktif')
                        <span style="color:green; font-weight:bold;">Aktif</span>
                    @else
                        <span style="color:red; font-weight:bold;">Pasif</span>
                    @endif
                </p>

                <div style="margin-top:10px;">
                    <a href="{{ route('blogs.edit', $blog->id) }}" style="color:blue; margin-right:10px;">Düzenle</a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Sil</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
