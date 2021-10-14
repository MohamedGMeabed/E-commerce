<?php

namespace App\Providers;

// use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);


        view()->composer('*', function ($view) {
            $title="";
            if(Request::segment(1)=='home'){
                $title ="Home";
           
            }elseif(Request::segment(1)=='about-us'){
                $title ="About Us";
               
            }elseif(Request::segment(1)=='contact-us'){
                $title ="Contact Us";
               
            }elseif(Request::segment(1)=='checkout'){
                $title ="Checkout";
                
            }elseif(Request::segment(1)=='cart'){
                $title ="Cart";
                
            }elseif(Request::segment(1)=='shop'){
                $title ="Shop";       
            }elseif(Request::segment(1)=='login'){
                $title ="Login";       
            }elseif(Request::segment(1)=='register'){
                $title ="Register";       
            }elseif(Request::segment(1)=='password'){
                $title ="Reset-Password";       
            }
            $view->with('title',$title);
        });
    }
}
