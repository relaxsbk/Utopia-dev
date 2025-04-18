<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request)
    {
        $query = $category->products()->published()->with(['images', 'brand']);

        if ($request->filled('brands')) {
            $query->whereIn('brand_id', (array) $request->input('brands'));
        }

        if ($request->boolean('in_stock')) {
            $query->where('quantity', '>', 0);
        }

        if ($request->filled('sort')) {
            match ($request->input('sort')) {
                'price_asc' => $query->orderBy('price'),
                'price_desc' => $query->orderByDesc('price'),
                'name_asc' => $query->orderBy('name'),
                'name_desc' => $query->orderByDesc('name'),
                default => null,
            };
        }

        $products = $query->get();

        // Фильтрация по обработанной цене (со скидкой)
        if ($request->filled('price_min') || $request->filled('price_max')) {
            $products = $products->filter(function ($product) use ($request) {
                $discounted = $product->priceDiscount();
                return (!$request->filled('price_min') || $discounted >= $request->input('price_min')) &&
                    (!$request->filled('price_max') || $discounted <= $request->input('price_max'));
            });
        }

        // Пагинация вручную
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 8;
        $paginated = new LengthAwarePaginator(
            $products->forPage($page, $perPage)->values(),
            $products->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $brands = Brand::published()->get();

        return view('product.products', [
            'category' => $category,
            'products' => $paginated,
            'brands' => $brands,
            'filters' => $request->only(['price_min', 'price_max', 'brands', 'in_stock', 'sort']),
        ]);
    }
}
