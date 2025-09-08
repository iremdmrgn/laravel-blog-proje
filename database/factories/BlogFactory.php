<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

class BlogFactory extends Factory
{
    protected $model = \App\Models\Blog::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['aktif', 'pasif']),
            'author_id' => Author::factory(),
        ];
    }
}
