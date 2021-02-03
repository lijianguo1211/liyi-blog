<?php
/**
 * Notes:
 * File name:CreateDataException
 * Create by: Jay.Li
 * Created on: 2021/2/3 0003 16:08
 */


namespace App\Exceptions;


use Throwable;

class CreateDataException extends AbstractException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->logInfo("新建资源出错：" . $message);
    }
}
