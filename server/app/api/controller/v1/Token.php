<?php
namespace app\api\controller\v1;

use app\api\validate\AppTokenGet;
use app\api\validate\UserTokenGet;
use app\api\service\AppToken;
use app\api\service\UserToken;
use app\api\controller\BaseController;

class Token extends BaseController
{
    public function getUserToken($code = '')
    {
        (new UserTokenGet())->goCheck();
        $ut = new UserToken($code);
        $token = $ut->get();
        return [
            'token' => $token,
        ];
    }

    public function getAppToken($ac='', $se='')
    {
        (new AppTokenGet())->goCheck();
        $app=new AppToken();
        $token = $app->get($ac, $se);
        return [
            'token' => $token,
        ];
    }

    public function verifyToken($token = '')
    {
        if(!$token)
        {
            return false;
        }
        return true;
    }
}