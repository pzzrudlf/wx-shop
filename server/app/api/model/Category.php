<?php


namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['create_time', 'update_time', 'delete_time', 'topic_img_id'];

//    public function products()
//    {
//        return $this->hasMany('Product', 'category_id', 'id');
//    }

    public function img()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }
}