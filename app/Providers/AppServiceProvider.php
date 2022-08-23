<?php

namespace App\Providers;

use App\ArtiFallow;
use App\Observers\ArtiFallowObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        ArtiFallow::observe(ArtiFallowObserver::class);
    }
}
