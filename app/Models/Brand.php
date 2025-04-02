<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'image', 'published'
    ];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
