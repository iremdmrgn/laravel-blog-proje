<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Bir kategori birden fazla bloga ait olabilir
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
