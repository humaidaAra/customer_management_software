<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
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
            App::singleton('currency_type', function(){
                return 'USD';
            });

       view()->composer('*', function ($view) {
        $view->with('current_currency_type', 'USD');
       });
    }
}
