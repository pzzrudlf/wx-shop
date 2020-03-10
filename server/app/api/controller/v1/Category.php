<?php


namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\common\exception\MissException;

class Category extends Base
{
    public function getAllCategories()
    {
        $categories = CategoryModel::all([], 'img');
        if($categories->isEmpty())
        {
            throw new MissException([
                'msg' => '没找到该分类',
            ]);
        }
        return $categories;
    }
}