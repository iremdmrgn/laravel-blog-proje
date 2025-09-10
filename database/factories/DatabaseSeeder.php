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
      
        $categories = Category::factory(5)->create();

       
        Blog::factory(10)->create()->each(function ($blog) use ($categories) {
            
            $blog->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
