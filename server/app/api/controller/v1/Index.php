<?php


namespace app\api\controller\v1;


class Index extends Base
{
    public function index()
    {
        return [
            'data' => 'success::api/v1.Index/index',
        ];
    }
}