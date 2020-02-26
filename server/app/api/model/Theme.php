<?php


namespace app\api\model;


class Theme extends BaseModel
{

    /* 一对一 有主从关系
     * theme表 一对一 image表
     */
    public function topicImg()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }
    /* 一对一 有主从关系
     * theme表 一对一 image表
     */
    public function headImg()
    {
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }

    /**
     *  theme表 多对多  product表
     *  中间表：theme_product表
     *  第三张表不需要创建model
     */
    public function products()
    {
        return $this->belongsToMany('Product', 'theme_product', 'product_id', 'theme_id');
    }

    /**
     * 对于Collection和Model，判空的方法不同
     * Collection 使用 $this->isEmpty()
     * Model 使用 empty()
     *返回的结果是Collection \think\model\Collection
     */
    public static function getThemesByID($id)
    {
//        $id = explode(',', $ids);
        return self::with(['topicImg', 'headImg'])->select($id);
    }

    /**
     * $id
     * 返回的结果是ORM模型 \think\Model
     */
    public static function getComplexOne($id)
    {
        return self::with('products,headImg,topicImg')->find($id);
    }
}