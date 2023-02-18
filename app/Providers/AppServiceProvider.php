<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
//        View::share('tagsCloud', Tag::all());
        View::composer('layouts.header', function ($view){
            $view->with('tagsCloud', Tag::all());
        });
        View::composer('layouts.header', function ($view){
            $view->with('categories', Category::all());
        });
        Paginator::useBootstrap();
    }
}
