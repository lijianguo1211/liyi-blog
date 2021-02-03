<?php
/**
 * Notes:
 * File name:AbstractException
 * Create by: Jay.Li
 * Created on: 2021/2/3 0003 16:11
 */


namespace App\Exceptions;


class AbstractException extends \Exception
{
    protected function logInfo(string $message)
    {
        \Log::error($message);
    }
}
