<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'quantity', 'published'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

     public function brand(): BelongsTo
     {
        return $this->belongsTo(Brand::class);
     }

     public function images(): HasMany
     {
         return $this->hasMany(Image::class);
     }

     public function reviews(): HasMany
     {
         return $this->hasMany(Review::class);
     }

}
