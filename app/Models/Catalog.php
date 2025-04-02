<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catalog extends Model
{
    /** @use HasFactory<\Database\Factories\CatalogFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'image', 'published'
    ];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
