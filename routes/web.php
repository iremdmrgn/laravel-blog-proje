<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController; 
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\ContactController; // iletişim için
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ana sayfa olarak login olmuş kullanıcı için home sayfasını göstermek
Route::get('/', [HomeController::class, 'index'])->name('home');

// Bloglar
Route::get('/blogs', [BlogController::class, 'frontendIndex'])->name('blogs.frontend');

// İletişim
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Profil (sadece login kullanıcılar)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin paneli (sadece login kullanıcılar)
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('blogs', AdminBlogController::class);
});

// Laravel’in hazır auth routes (Breeze)
require __DIR__.'/auth.php';
