<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Blog;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 5 kategori oluştur
        $categories = Category::factory(5)->create();

        // 10 blog oluştur
        Blog::factory(10)->create()->each(function ($blog) use ($categories) {
            // her blog için 1-3 kategori ata
            $blog->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
