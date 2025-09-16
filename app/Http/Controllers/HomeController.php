<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; // Blog modelini ekle

class HomeController extends Controller
{
    public function index()
    {
        // Öne çıkan blogları çek (aktif ve ilk 3)
        $featuredBlogs = Blog::where('status', 'aktif')->take(3)->get();

        return view('home', compact('featuredBlogs'));
    }
}
