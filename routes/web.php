<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Views\CartController;
use App\Http\Controllers\Views\CatalogController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\ProductController;
use Illuminate\Support\Facades\Route;





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

Route::controller(ReviewController::class)->middleware(['auth'])->group(function (){
    Route::post('/review/create','store')->name('review.create');
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

require __DIR__.'/admin.php';
