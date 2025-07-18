<?php

namespace App\Providers;

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
       // prevent Laravel from lazy-loading relationships 
       // it helps avoid performance issues in development
       // Model::preventLazyLoading(! $this->app->isProduction());

      // prevent Laravel from silently ignoring attributes that are not in the $fillable array
      // it helps catch mass assignment issues early
      //Model::preventSilentlyDiscardingAttributes(! $this->app->isProduction());

    }
}
