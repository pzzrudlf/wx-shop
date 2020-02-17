<?php


namespace app\api\controller\v1;


use app\api\controller\BaseController;

class Demo extends BaseController
{
    public function getBannerByID()
    {
        $data = config('data.banner');
        return $data[0];
    }
}