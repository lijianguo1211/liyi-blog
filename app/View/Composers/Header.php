<?php
/**
 * Notes:
 * File name:Header
 * Create by: Jay.Li
 * Created on: 2021/1/26 0026 18:24
 */


namespace App\View\Composers;

use Illuminate\View\View;

class Header
{
    public function compose(View $view)
    {
        $headerData = app('header')->getList();

        $view->with(compact('headerData'));
    }
}
