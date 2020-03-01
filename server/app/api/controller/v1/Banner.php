<?php


namespace app\api\controller\v1;

use app\common\controller\Common;

//这里的Banner类的全称是"app\api\controller\v1\Banner",不是"Banner"
//
//此时，我没有继承ThinkPHP中的控制器类，因为现在我用不到它
class Banner extends Common
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
        print_r(__CLASS__);echo "<br>";
        exit($this->test());
    }
}