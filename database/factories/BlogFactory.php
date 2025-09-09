<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Blog;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph(5),
            'status' => $this->faker->randomElement(['aktif', 'pasif']),
            'author_id' => Author::factory(), // yeni yazar oluşturur
        ];
    }
}
