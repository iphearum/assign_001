<?php

namespace App\Providers;

use App\Category;
use App\Post;
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
        View::composer('layouts.posts.*',function ($view){
            return $view->with('posts', Post::where('is_active','>',0)->paginate(5));
        });
        View::composer('layouts.posts.*',function ($view){
            return $view->with('categories', Category::all());
        });
    }
}
