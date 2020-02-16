<?php
/**
 * Created by PhpStorm.
 * User: zouxiaojie
 * Date: 2019/6/12
 * Time: 9:23 PM
 */

namespace app\common\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '指定商品分类不存在，请检查商品分类ID';
    public $errorCode = 20000;
}