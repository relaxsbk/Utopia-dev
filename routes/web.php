<?php

use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCatalogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminImageController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Views\CartController;
use App\Http\Controllers\Views\CatalogController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/catalog-no-publish', [AdminCatalogController::class, 'noPublished'])->name('catalog.no.publish');
    Route::resource('catalog', AdminCatalogController::class)->except('show', 'edit', 'create');

    Route::get('/category-no-publish', [AdminCategoryController::class, 'noPublished'])->name('category.no.publish');
    Route::resource('category', AdminCategoryController::class)->except('show', 'edit', 'create');

    Route::get('/brand-no-publish', [AdminBrandController::class, 'noPublished'])->name('brand.no.publish');
    Route::resource('brand', AdminBrandController::class)->except('show', 'edit', 'create');

    Route::get('/product-no-publish', [AdminProductController::class, 'noPublished'])->name('products.no.publish');
    Route::resource('products', AdminProductController::class)->except( 'edit', 'create');

    Route::put('products/{product}/images', [AdminImageController::class, 'update'])->name('products.image.update');
    Route::delete('products/images/{image}', [AdminImageController::class, 'destroy'])->name('products.image.destroy');


    Route::resource('users', AdminUserController::class);
});



Route::get('/', HomeController::class)->name('home');

Route::controller(CatalogController::class)->group(function () {
    Route::get('/catalog', 'index')->name('catalog');
    Route::get('/catalog/{catalog:slug}', 'show')->name('catalog.show');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/{category:slug}', 'show')->name('categoryWithProducts');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{product:slug}', 'show')->name('product.show');
});



Route::controller(FavoriteController::class)->middleware(['auth.message'])->group(function () {
    Route::post('/favorite/add/{product:id}', 'addToFavorite')->name('addToFavorite');
    Route::delete('/favorite/remove/{product:id}', 'removeFromFavorites')->name('removeFromFavorites');
});

Route::controller(CartController::class)->middleware(['auth.message'])->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::post('/cart/add/{product:id}', 'addToCart')->name('addToCart');
    Route::get('/cart/remove/{product:id}', 'removeFromCart')->name('removeFromCart');
});

Route::controller(OrderController::class)->middleware('auth')->group(function () {
    Route::post('/checkout', 'store')->name('checkout');
});

Route::middleware('auth.message')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
