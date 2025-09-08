<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Blog;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 5 yazar oluştur
        Author::factory(5)->create();

        // 5 kategori oluştur
        Category::factory(5)->create();

        // 10 blog oluştur ve rastgele kategorilere bağla
        Blog::factory(10)->create()->each(function($blog){
            $categories = Category::inRandomOrder()->take(rand(1,3))->pluck('id');
            $blog->categories()->attach($categories);
        });
    }
}
