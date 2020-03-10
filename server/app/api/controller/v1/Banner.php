<?php


namespace app\api\controller\v1;

class Banner extends Base
{
    //这个是控制器类的方法，
    //是要跟url产生对应关系的
    public function index()
    {
        //这个json方法是助手函数
        return json([], 404);
    }

    public function demo()
    {
        return false;
    }
}