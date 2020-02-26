<?php


namespace app\api\model;


class BannerItem extends BaseModel
{
    protected $hidden = ['img_id', 'delete_time', 'update_time'];

    /**
     * banner_item表 一对一 image表
     */
    public function img()
    {
        return $this->hasOne('Image', 'id', 'img_id');
        //return $this->belongsTo('Image', 'img_id', 'id');
    }
}
