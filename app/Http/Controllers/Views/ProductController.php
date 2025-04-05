<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($product)
    {
        $product = Product::query()
            ->where('slug', $product)
            ->firstOrFail();

        $isFavorite = false;

        if (auth()->check()) {
            $user = auth()->user();

            $favorite = $user->favorite;

            if ($favorite) {
                $isFavorite = $favorite->items()
                    ->where('product_id', $product->id)
                    ->exists();
            }
        }

        return view('product.product', compact('product', 'isFavorite'));
    }



//    public function show($product)
//    {
//        $product = Product::query()
//            ->where('slug', $product)
//            ->first();
//
//        return view('product.product', compact('product'));
//    }
}
