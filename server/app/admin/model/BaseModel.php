<?php


namespace app\admin\model;


use think\Model;

class BaseModel extends Model
{
    protected function basePaginate($pageSize=null, $config=[])
    {
        return self::paginate($pageSize, false, $config);
    }
}