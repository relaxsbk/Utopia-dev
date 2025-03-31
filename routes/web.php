<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Views\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::controller(\App\Http\Controllers\Views\CatalogController::class)->group(function () {
    Route::get('/catalog', 'index')->name('catalog');
//    TODO: Убрать на слаг
    Route::get('/catalog/1', 'show')->name('catalog.show');
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
