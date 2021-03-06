<?php


namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    /**一对一
     * 一对一有主从关系的
     * 表没有外键时使用：hasOne('关联模型名','外键名','主键名',['模型别名定义'],'join类型');
     * 表中有外键时使用：belongsTo('关联模型名','外键名','关联表主键名',['模型别名定义'],'join类型');
     *
     */

    /**一对多
     * hasMany('关联模型名','外键名','主键名',['模型别名定义']);
     * belongsTo('关联模型名','外键名','关联表主键名',['模型别名定义'],'join类型');
     */

    /**多对多
     * belongsToMany('关联模型名','中间表名','外键名','当前模型关联键名',['模型别名定义']);
     * belongsToMany('关联模型名','中间表名','外键名','当前模型关联键名',['模型别名定义']);
     */

    /**远程一对多
     * hasManyThrough('关联模型名','中间模型名','外键名','中间模型关联键名','当前模型主键名',['模型别名定义']);
     */

    protected $hidden = ['delete_time', 'update_time'];
    protected $autoWriteTimestamp = true;
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    protected function img_prefix($value, $data)
    {
        $temp = $value;
        if($data['from'] == 1)
        {
            $temp = config('setting.img_prefix').$value;
        }
        return $temp;
    }
}