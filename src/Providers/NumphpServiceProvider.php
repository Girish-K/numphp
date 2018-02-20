<?php

namespace Girishk\Providers;

use Illuminate\Support\ServiceProvider;
use Girishk\Numphp;

class NumphpServiceProvider extends ServiceProvider
{
    /**
     * keyto bind Numphp as in the Service Container.
     *
     * @var string
     */
    public static $key = 'girishk_numphp';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(static::$key, function ($app) {
		    return new Numphp();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(static::$key);
    }
}
