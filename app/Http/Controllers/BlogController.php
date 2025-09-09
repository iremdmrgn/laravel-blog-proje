<?php

namespace App\Http\Controllers;
use App\Models\Blog; 
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource (admin paneli).
     */
    public function index()
    {
        $blogs = Blog::with(['author', 'categories'])->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();

        return view('admin.blogs.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
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




        if ($request->has('categories')) {
            $blog->categories()->sync($request->categories);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla eklendi!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();

        return view('admin.blogs.edit', compact('blog', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    $blog->title = $request->title;
    $blog->content = $request->content;
    $blog->author_id = $request->author_id;
    $blog->status = $request->status; // direkt enum
    $blog->save();

    $blog->categories()->sync($request->categories ?? []);

    return redirect()->route('blogs.index')->with('success', 'Blog başarıyla güncellendi.');
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
            if(auth()->user()->is_admin) {
                $blogs = Blog::with(['author','categories'])->get();
            } else {
                $blogs = Blog::with(['author','categories'])
                    ->where('status', 'aktif')
                    ->get();
            }
        } else {
            $blogs = Blog::with(['author','categories'])
                ->where('status', 'aktif')
                ->get();
        }

        return view('admin.blogs.frontend_index', compact('blogs'));
    }
}
