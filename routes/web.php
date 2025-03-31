<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::controller(\App\Http\Controllers\Views\CatalogController::class)->group(function () {
    Route::get('/catalog', 'index')->name('catalog');
//    TODO: Убрать на слаг
    Route::get('/catalog/1', 'show')->name('catalog.show');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/1', 'show')->name('categoryWithProducts');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/1', 'show')->name('product.show');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
