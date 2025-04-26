<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'discount','rating', 'quantity', 'published', 'category_id', 'brand_id'
    ];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
    public function formattedRating(): ?string
    {
        return $this->rating !== null ? number_format($this->rating, 1) : null;
    }

    public function shortDescription(): string
    {
        return Str::limit($this->description, 30);
    }

    public function money(): string
    {
        return number_format($this->price, 0, '', ' ');
    }

    public function priceDiscount(): float
    {
        return round($this->price - ($this->price * ($this->discount / 100)));
    }


    public function priceDiscountFormatted(): string
    {
        return number_format($this->priceDiscount(), 0, '', ' ');
    }

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

    public function mainImage()
    {
        return $this->images()->first();
    }

}
