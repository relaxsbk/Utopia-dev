<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
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

    public function show($catalog)
    {
//      :TODO  Потом изменить на другой поиск (если возможно пользоваться ресурсами)
        $catalog = Catalog::query()
            ->published()
            ->where('slug', $catalog)
            ->firstOrFail();

        $categories = $catalog->categories()->published()->paginate(6);

        return view('categories', compact('catalog', 'categories'));
    }
}
