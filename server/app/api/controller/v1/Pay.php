<?php


namespace app\api\controller\v1;

use app\common\wechat\pay\WxPayConfig;

class Pay extends Base
{
    public function index()
    {
        new WxPayConfig();
        return $this->fetch();
    }
}