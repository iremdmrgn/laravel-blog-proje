<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource (admin paneli).
     */
    public function index()
    {
        $blogs = \App\Models\Blog::with(['author', 'categories'])->get(); // ilişkileri eager load ediyoruz
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kategorileri ve yazarları formda göstermek için çekebiliriz
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();

        return view('admin.blogs.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Form verilerini doğrula
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'status' => 'required|in:0,1',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Blog oluştur
        $blog = \App\Models\Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => $request->author_id,
            'status' => $request->status,
        ]);

        // Seçilen kategorileri ekle
        if ($request->has('categories')) {
            $blog->categories()->sync($request->categories);
        }

        // Liste sayfasına yönlendir
        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla eklendi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Frontend için: blogları göster.
     * Login durumuna göre pasif içerikleri filtreler.
     */
    public function frontendIndex()
{
    if(auth()->check()) {
        // Login olmuş kullanıcı
        if(auth()->user()->is_admin) { 
            // Yönetici ise tüm bloglar (aktif + pasif)
            $blogs = \App\Models\Blog::with(['author','categories'])->get();
        } else {
            // Normal kullanıcı ise sadece aktif bloglar
            $blogs = \App\Models\Blog::with(['author','categories'])
                ->where('status', 1)
                ->get();
        }
    } else {
        // Login olmamış kullanıcı: sadece aktif bloglar
        $blogs = \App\Models\Blog::with(['author','categories'])
            ->where('status', 1)
            ->get();
    }

    return view('admin.blogs.frontend_index', compact('blogs'));

}

}
