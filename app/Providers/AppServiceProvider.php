<?php

namespace App\Providers;

use App\Http\Resources\Catalog\MiniCatalogResource;
use App\Http\Resources\Category\MiniCategoryResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        MiniCatalogResource::withoutWrapping();
        MiniCategoryResource::withoutWrapping();
    }
}
