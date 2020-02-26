<?php
namespace app\api\service;

use app\api\model\ThirdApp as ThirdAppModel;
use app\common\exception\TokenException;

class AppToken extends Token
{
    public function get($ac, $se)
    {
        $app = ThirdAppModel::check($ac, $se);
        if(!$app)
        {
            throw new TokenException([
                'msg' => '授权失败',
                'errorCode' => 10004,
            ]);
        }
        else {
            $scope = $app->scope;
            $uid = $app->id;
            $values = [
                'uid' => $uid,
                'scope' => $scope,
            ];
            $token = $this->saveToCache($values);
            return $token;
        }
    }

    private function saveToCache($values)
    {
        $token = self::generateToken();
        $expire_in = config('setting.token_expire_in');
        $res = cache($token, json_encode($values), $expire_in);
        if(!$res)
        {
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005,
            ]);
        }
        return $token;
    }

}