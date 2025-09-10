<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Author;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['author', 'categories'])->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
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
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'authors', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'status' => 'required|in:aktif,pasif',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
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
}
