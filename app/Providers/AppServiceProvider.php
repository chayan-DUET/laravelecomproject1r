<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // View::share('name','chayan');
       View::composer('frontEnd.includes.menu',  function ($view){
          //$view->with('name','Chayan') ;
         $publishedCategories= Category::where('publicationStatus',1)->get();
           $view->with('publishedCategory',$publishedCategories) ;
       });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
