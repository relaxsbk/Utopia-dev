<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category)
    {
        //TODO: нормальное обращение через ресурсы
        $category = Category::where('slug', $category)->first();

        $products = $category->products()->published()->paginate(8);

        return view('product.products', compact('category', 'products'));
    }
}
