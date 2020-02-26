<?php


namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = [
        'delete_time', 'update_time',
        'create_time', 'category_id',
        'main_img_id', 'from', 'pivot',
    ];

    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->img_prefix($value, $data);
    }

    public static function getRecent()
    {
        $products = self::order('update_time desc')->select();
        return $products;
    }

    public static function getDetailByID($id)
    {
        return self::with([
            'imgs' => function($query){
                $query->with(['imgUrl'])->order('order', 'desc');
            }
        ])->with(['properties'])->find($id);
    }
}