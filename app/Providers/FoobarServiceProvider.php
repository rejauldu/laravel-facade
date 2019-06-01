<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Foobar;

class FoobarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('foobar', function() {
			return new Foobar;
		});
    }
}