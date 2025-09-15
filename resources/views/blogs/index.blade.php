@extends('layouts.app') 
@section('content')
<div class="container" style="padding: 20px;">
    <h1 style="text-align:center; margin-bottom:30px;">Bloglar</h1>

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
                {{-- HTML içeriği render etmek için {!! !!} kullanıyoruz --}}
                <p>{!! $blog->content !!}</p>
                <p><strong>Yazar:</strong> {{ $blog->author->name ?? 'Bilinmiyor' }}</p>
                <p><strong>Kategoriler:</strong>
                    @foreach($blog->categories as $category)
                        {{ $category->name }}@if(!$loop->last), @endif
                    @endforeach
                </p>
{{-- <p><strong>Status:</strong> {{ $blog->status }}</p> --}}

            </div>
        @endforeach
    @endif
</div>
@endsection

