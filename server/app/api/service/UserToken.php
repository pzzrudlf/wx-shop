<?php
namespace app\api\service;

use think\Exception;
use app\api\model\User as UserModel;
use app\common\exception\TokenException;
use app\common\exception\WeChatException;

class UserToken extends Token
{
    protected $code;
    protected $app_id;
    protected $app_secret;
    protected $login_url;

    public function __construct($code)
    {
        $this->code = $code;
        $this->app_id = config('wechat.app_id');
        $this->app_secret = config('wechat.app_secret');
        $this->login_url = sprintf(config('wechat.login_url'), $this->app_id, $this->app_secret, $this->code);
    }

    public function get()
    {
        $res = curl_get($this->login_url);
        $wechat_res = json_decode($res, true);
        if(empty($wechat_res)) {
            throw new Exception('获取openid失败');
        }else{
            $login_fail = array_key_exists('errcode', $wechat_res);
            if($login_fail)
            {
                $this->handleErr($wechat_res);
            }else{
//                $this->grantToken($wechat_res);
                return $this->grantToken($wechat_res);
            }
        }
    }

    private function grantToken($wechat_res)
    {
        $openid = $wechat_res['openid'];
        $user = UserModel::getByOpenID($openid);
        if(empty($user))
        {
            $uid = $this->createUser($openid);
        }else{
            $uid = $user->id;
        }

        $cachedValue = $this->prepareCachedValue($wechat_res, $uid);

        $token = $this->saveToCache($cachedValue);
        return $token;
    }

    private function saveToCache($cachedValue)
    {
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');
        $res = cache($key, $value, $expire_in);
        if(!$res)
        {
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005,
            ]);
        }
        return $key;
    }

    private function prepareCachedValue($wechat_res, $uid)
    {
        $cachedValue = $wechat_res;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] = 16;
        return $cachedValue;
    }

    private function createUser($openid)
    {
        $user = UserModel::create([
            'openid' => $openid,
        ]);
        return $user->id;
    }

    /**
     * @param $wechat_res
     * @throws WeChatException
     * array (size=2)
    'errcode' => int 40163
    'errmsg' => string 'code been used, hints: [ req_id: EilAlfyFe-iUvjua ]'
     */
    private function handleErr($wechat_res)
    {
        throw new WeChatException([
            'msg' => $wechat_res["errmsg"],
            'errorCode' => $wechat_res["errcode"],
        ]);
    }

}