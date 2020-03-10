<?php


namespace app\api\validate;


class AppTokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code，不能获取token'
    ];
}