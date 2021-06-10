<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['category'] =Category::all();
        view()->share($data);
        Paginator::useBootstrap();
        $data['product'] =Product::all();
        view()->share($data);
        Paginator::useBootstrap();
        
    }
}
