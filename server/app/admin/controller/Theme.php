<?php


namespace app\admin\controller;


class Theme extends Base
{
    public function index()
    {
        $themes = [];
        for($i=0;$i<10;$i++)
        {
            $themes[] = $i;
        }
        $this->assign('themes', $themes);
        return $this->fetch();
    }
}