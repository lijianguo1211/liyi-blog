<?php

namespace App\Providers;

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
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);

            \DB::listen(function ($query) {
                $bindings = $query->bindings;
                foreach ($bindings as $key => $binding) {
                    if ($binding instanceof \DateTime) {
                        $bindings[$key] = $binding->format('\'Y-m-d H:i:s\'');
                    } elseif (is_string($binding)) {
                        $bindings[$key] = "'$binding'";
                    }
                }

                $queryLog = str_replace(array('%', '?'), array('%%', '%s'), $query->sql);

                $sql = vsprintf($queryLog, $bindings);

                //\Log::debug($sql);
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
