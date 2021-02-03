<?php
/**
 * Notes:
 * File name:${fILE_NAME}
 * Create by: Jay.Li
 * Created on: 2021/2/3 0003 16:46
 */

use App\Service\AbstractService;

if (!function_exists('fileLocal')) {
    /**
     * @Notes: 格式化错误信息
     *
     * @param AbstractService $service
     * @param Throwable $e
     * @param string $method
     * @return string
     * @auther: Jay
     * @Date: 2021/2/3 0003
     * @Time: 17:32
     */
    function fileLocal(AbstractService $service, Throwable $e, string $method)
    {
        return " 当前的类是：" . get_class($service) .
            " 当前的方法是：" . $method . '()' .
            " 当前的错误原因：" . $e->getMessage();
    }
}
