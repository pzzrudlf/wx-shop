<?php


namespace app\common\exception;


use think\Exception;
use Throwable;

/**
 * 状态码：
 * 404 Not Found
 * 400 Bad Request (error parameter)
 * 200 GET method success
 * 201 POST method success
 * 202 PUT method success
 * 401  Unauthorized
 * 403 Forbidden
 * 500 Interval Web Error
 * 统一描述错误
 *   错误码：自定义的错误id号
 *   错误信息：
 *   当前URL
 */
class BaseException extends Exception
{
    // HTTP 状态码 404 400 200 201 202 401 403 500
    public $code = 400;
    // 错误信息
    public $msg = '参数错误';
    // 自定义错误码
    public $errorCode = 10000;

    public function __construct($params = [])
    {
        if(!is_array($params))
        {
            return ;
//            throw new Exception();
        }
        if(array_key_exists('code', $params))
        {
            $this->code = $params['code'];
        }
        if(array_key_exists('msg', $params))
        {
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode', $params))
        {
            $this->errorCode = $params['errorCode'];
        }
    }

}