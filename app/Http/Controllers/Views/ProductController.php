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
            ->first();

        return view('product.product', compact('product'));
    }
}
