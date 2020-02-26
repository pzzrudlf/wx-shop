<?php

namespace app\api\service;


use app\common\exception\TokenException;
use think\Cache;
use think\Request;
use think\Exception;

class Token
{
    //32 位随机字符串
    protected static function generateToken()
    {
        $randchar = getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME'];
        $salt = config('setting.token_salt');
        return md5($randchar.$timestamp.$salt);
    }

    public static function getCurrentUID()
    {
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }

    public static function getCurrentTokenVar($key)
    {
        $token = Request::instance()->header('token');
        $vars = Cache::get($token);
        if(!$vars)
        {
            throw new TokenException();
        }else{
            if(!is_array($vars))
            {
                $vars = json_decode($vars, true);
            }
            if(array_key_exists($key, $vars))
            {
                return $vars[$key];
            }else{
                throw new Exception('Token变量不存在');
            }
        }
    }
}