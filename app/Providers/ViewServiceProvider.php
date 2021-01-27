<?php
/**
 * Notes:
 * File name:ViewServiceProvider
 * Create by: Jay.Li
 * Created on: 2021/1/26 0026 18:46
 */


namespace App\Providers;

use App\View\Composers\Header;
use Illuminate\View\ViewServiceProvider as ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->header();
    }

    private function header()
    {
        view()->composer(['layouts._header'], Header::class);

    }
}
