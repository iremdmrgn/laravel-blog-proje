<?php

namespace App\Http\Controllers;

use App\Models\Blog; 
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Admin paneli: blog listesi
    public function index()
    {
        $blogs = Blog::with(['author', 'categories'])->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    // Blog oluşturma formu
    public function create()
    {
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();
        return view('admin.blogs.create', compact('authors', 'categories'));
    }

    // Blog kaydet
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'status' => 'required|in:aktif,pasif',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => $request->author_id,
            'status' => $request->status,
        ]);

        if ($request->has('categories')) {
            $blog->categories()->sync($request->categories);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla eklendi!');
    }

    // Blog düzenleme formu
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();
        return view('admin.blogs.edit', compact('blog', 'authors', 'categories'));
    }

    // Blog güncelle
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
            'status' => 'required|in:aktif,pasif', // enum değerleri
        ]);

  $blog->update([
    'title' => $request->title,
    'content' => $request->content,
    'author_id' => $request->author_id,
    'status' => $request->status,
]);



        $blog->categories()->sync($request->categories ?? []);

        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla güncellendi.');
    }

    // Blog sil
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->categories()->detach();
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla silindi.');
    }

    // Frontend: blog listesi
    public function frontendIndex()
    {
        if(auth()->check()) {
            if(auth()->user()->is_admin) {
                $blogs = Blog::with(['author','categories'])->get();
            } else {
                $blogs = Blog::with(['author','categories'])->where('status', 'aktif')->get();
            }
        } else {
            $blogs = Blog::with(['author','categories'])->where('status', 'aktif')->get();
        }

        return view('admin.blogs.frontend_index', compact('blogs'));
    }
}
