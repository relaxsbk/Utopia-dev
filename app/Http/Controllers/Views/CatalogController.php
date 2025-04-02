<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Resources\Catalog\CatalogResource;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::query()
            ->select('name', 'slug', 'image')
            ->get();

        return view('catalog', compact('catalogs'));
    }

    public function show(Catalog $catalog)
    {
//      :TODO Сделать отображение только доступных через эксепшен
        $categories = $catalog->categories()
            ->published()
            ->paginate(6);

        return view('categories', [
            'catalog' => new CatalogResource($catalog),
            'categories' => $categories,
        ]);
    }
}
