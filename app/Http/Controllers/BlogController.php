<?php

namespace App\Http\Controllers;

use App\Models\Blog; 
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::with(['author', 'categories'])->get();
        return view('admin.blogs.index', compact('blogs'));
    }


    public function create()
    {
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();
        return view('admin.blogs.create', compact('authors', 'categories'));
    }


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

   
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();
        return view('admin.blogs.edit', compact('blog', 'authors', 'categories'));
    }


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

   
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->categories()->detach();
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla silindi.');
    }


  public function frontendIndex()
{
    if (auth()->check() && auth()->user()->is_admin) {
        // Admin tüm blogları görür
        $blogs = Blog::with(['author','categories'])->get();
    } else {
        // Guest veya normal kullanıcı sadece Aktif blogları görür
        $blogs = Blog::with(['author','categories'])
                     ->where('status', 'aktif')
                     ->get();
    }

    return view('blogs.index', compact('blogs')); // frontend view yolu
}

}
