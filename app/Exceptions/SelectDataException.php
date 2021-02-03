<?php
/**
 * Notes:
 * File name:SelectDataException
 * Create by: Jay.Li
 * Created on: 2021/2/3 0003 16:09
 */


namespace App\Exceptions;

use Throwable;

class SelectDataException extends AbstractException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->logInfo("查询资源不存在：" . $message);
    }
}
