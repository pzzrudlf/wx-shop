<?php


namespace app\admin\validate;


use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        return true;
    }
}