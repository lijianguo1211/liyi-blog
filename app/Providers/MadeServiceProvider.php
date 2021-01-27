<?php

namespace App\Providers;

use App\Service\HeaderService;
use Illuminate\Support\ServiceProvider;

class MadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHeader();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function registerHeader()
    {
        $this->app->singleton('header', function () {
            return new HeaderService();
        });
    }
}
