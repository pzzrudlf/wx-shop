<?php


namespace app\admin\controller;


class Banner extends Base
{
    public function index()
    {
        $banners = [];
        for($i=0;$i<10;$i++)
        {
            $banners[] = $i;
        }
        $this->assign('banners', $banners);
        return $this->fetch();
    }
}