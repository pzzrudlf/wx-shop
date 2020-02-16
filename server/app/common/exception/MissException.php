<?php


namespace app\common\exception;


class MissException extends BaseException
{
    public $code = 404;
    public $msg = '未找到请求资源';
    public $errorCode = 40000;
}