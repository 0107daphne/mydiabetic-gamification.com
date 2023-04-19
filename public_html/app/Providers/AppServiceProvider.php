<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder; // Import Builder where defaultStringLength method is defined

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind('path.public', function() {
            return realpath(base_path().'/../public_html');
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191); // Update defaultStringLength
    }
}
