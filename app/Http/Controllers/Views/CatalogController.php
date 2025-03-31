<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('catalog');
    }

    public function show()
    {
        return view('categories');
    }
}
