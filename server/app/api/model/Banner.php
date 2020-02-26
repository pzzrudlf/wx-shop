<?php


namespace app\api\model;


/**
 * 查询构建器 find() select()
 * ORM get() all()
 * Class Banner
 * @package app\api\model
 */
class Banner extends BaseModel
{
    public static function getBannerByID($id)
    {
//        $result = Db::table('banner_item')->where('banner_id', '=', $id)->select();
        return self::with(['items', 'items.img'])->find($id);
    }

    /**
     * banner表 一对一 banner_item表
     */
    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }
}