<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use App\Models\TopHeaders;
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
        view()->composer('*', function($view) {
            $view->with('topheader', TopHeaders::find(1));
        });
        view()->composer('*', function($view) {
            $view->with('front_categories', Category::query()->Active()->get());
        });
        view()->composer('*', function($view) {
            $view->with('about', About::find(1));
        });
    }
}
