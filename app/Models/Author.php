<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Bir yazarın birden fazla blogu olabilir
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
