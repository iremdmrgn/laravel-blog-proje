<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController; 
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\ContactController; // 📌 iletişim için eklendi
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Frontend: kullanıcılar için blog listesi
Route::get('/blogs', [BlogController::class, 'frontendIndex'])->name('blogs.frontend');

// İletişim sayfası
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin paneli route grubu
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin Blog CRUD
    Route::resource('blogs', AdminBlogController::class);
});

require __DIR__.'/auth.php';
