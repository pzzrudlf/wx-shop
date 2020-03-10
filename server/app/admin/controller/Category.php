<?php


namespace app\admin\controller;

use app\admin\validate\CategoryValidate;
use think\Request;

class Category extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    public function create()
    {
        if(Request::instance()->isPost()){
            (new CategoryValidate())->goCheck();
            $data = Request::instance()->param();
            var_dump($data);die;
        }
        return $this->fetch();
    }
}