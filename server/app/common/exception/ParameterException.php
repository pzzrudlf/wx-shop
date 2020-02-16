<?php
/**
 * Created by PhpStorm.
 * User: zouxiaojie
 * Date: 2019/6/6
 * Time: 1:12 PM
 */

namespace app\common\library\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $errorCode = 10000;
    public $msg = "invalid parameters";
}