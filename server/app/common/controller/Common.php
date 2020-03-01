<?php

namespace app\common\controller;


class Common
{
    public function test()
    {
        return __CLASS__.
            ' 中的'
            .__METHOD__.
            ' 方法';
    }
}