<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'status',
        'author_id',
    ];

    // Bir blog bir yazara ait
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Bir blog birden fazla kategoriye ait
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    // App\Models\Blog.php



}
