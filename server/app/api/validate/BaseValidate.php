<?php


namespace app\api\validate;


use think\Request;
use think\Validate;
use app\common\exception\ParameterException;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        $params = Request::instance()->param();
        $result = $this->batch()->check($params);
        if(!$result)
        {
            throw new ParameterException([
                'msg' => $this->error,
            ]);
        }else{
            return true;
        }
    }

    public function getDataByRule($array)
    {
        if(array_key_exists('uid', $array) || array_key_exists('user_id', $array))
        {
            throw new ParameterException([
                'msg' => '请求中不能包含用户id',
            ]);
        }
        $newData = [];
        foreach($this->rule as $key => $value)
        {
            $newData[$key] = $array[$key];
        }
        return $newData;
    }

    protected function isPositiveInt($value, $rule = '', $data = '', $field = '')
    {
        if(is_numeric($value) && is_int($value + 0) && ($value+0)>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function checkIDs($value, $rule = '', $data = '', $field = '')
    {
        $ids = explode(',', $value);
        if(empty($ids))
        {
            return false;
        }
        foreach($ids as $id)
        {
            if(!$this->isPositiveInt($id))
            {
                return false;
            }
        }
        return true;
    }

    protected function isNotEmpty($value, $rule = '', $data = '', $field = '')
    {
        if(empty($value))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    protected function isMobile($value)
    {
        $rule = '^((0\d{2,3}-\d{7,8})|(1[3584]\d{9}))$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}