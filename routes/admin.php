<?php

use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCatalogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminImageController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth.message', 'admin'])->group(function () {
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

    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/orders', 'index')->name('orders.index');
        Route::get('/orders-new', 'new')->name('orders.new');
        Route::put('/orders/{order}/status', 'updateStatus')->name('orders.updateStatus');
    });

});
