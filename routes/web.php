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

// ----------------------
// Guest kullanıcılar için
// ----------------------
Route::get('/', function () {
    return view('welcome'); // guest welcome Blade
})->name('welcome');

// Bloglar
Route::get('/blogs', [BlogController::class, 'frontendIndex'])->name('blogs.frontend');

// İletişim
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// ----------------------
// Login olmuş kullanıcılar için
// ----------------------
Route::middleware('auth')->group(function () {

    // Home sayfası
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin paneli
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::resource('blogs', AdminBlogController::class);
    });
});

// ----------------------
// Auth routes (Breeze / Jetstream)
// ----------------------
require __DIR__.'/auth.php';
