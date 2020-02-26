<?php

namespace app\api\model;

class Image extends BaseModel
{
    public function item()
    {
        return $this->hasOne('BannerItem', 'img_id', 'id');
        //return $this->belongsTo('BannerItem', 'id', 'img_id');
    }

    public function getUrlAttr($value, $data)
    {
        return $this->img_prefix($value, $data);
    }

}
