<?php
/**
 * Notes:
 * File name:AbstractService
 * Create by: Jay.Li
 * Created on: 2021/1/26 0026 17:20
 */


namespace App\Service;


abstract class AbstractService
{
    public function __construct()
    {
        $this->register();
    }

    abstract public function register();
}
