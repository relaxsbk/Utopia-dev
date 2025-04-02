<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $products = $category->products()->published()->paginate(8);

        return view('product.products', [
            'category' => new CategoryResource($category),
            'products' => $products,
        ]);
    }
}
