<?php
/**
 * Notes:
 * File name:Header
 * Create by: Jay.Li
 * Created on: 2021/1/26 0026 18:24
 */


namespace App\View\Composers;

use App\Service\HeaderService;
use Illuminate\View\View;

class Header
{
    public function compose(View $view)
    {
        $service = new HeaderService();

        $headerData = $service->getList();

        $view->with(compact('headerData'));
    }
}
