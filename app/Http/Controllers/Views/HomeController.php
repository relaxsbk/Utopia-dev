<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\MiniCategoryResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::query()
            ->select('name', 'image', 'slug')
            ->published()
            ->take(5)
            ->get();

        $brands = Brand::query()
            ->select('name', 'image')
            ->published()
            ->take(6)
            ->get();

        $productsDiscount = Product::query()
            ->published()
            ->where('discount', '>', 0)
            ->with('mainImageHas')
            ->take(5)
            ->get();


//        dd($productsDiscount->images());

        return view('home', [
            'categories' => MiniCategoryResource::collection($categories),
            'brands' => $brands,
            'productsDiscount' => $productsDiscount,
        ]);
    }
}
