<?php


namespace app\admin\validate;


use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        $params = Request::instance()->param();
        $res = $this->batch()->check($params);
        if(!$res)
        {
            throw new Exception([
                'msg' => $this->error,
            ]);
        }else{
            return true;
        }
    }
}