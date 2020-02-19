<?php


namespace app\api\controller\v1;


use app\api\controller\BaseController;

class Demo extends BaseController
{
    protected $data = null;

    public function _initialize()
    {
        $this->data = config('data');
    }

    public function getBannerByID()
    {
        return $this->data['banner'][0];
    }

    public function getBannerByName()
    {
        return $this->data['banner'][0];
    }

    public function getThemesByName()
    {
        return $this->data['theme']['list'];
    }

    public function getThemeWithSpuByName()
    {
        return $this->data['theme']['one'];
    }

    public function getActivityByName()
    {
        return $this->data['activity'][0];
    }

    public function getActivityByNameWithSpu()
    {
        return $this->data['activity'][1];
    }

    public function getCouponsByCategoryID()
    {
        return $this->data['coupon'];
    }

    /**
     * @return null
     */
    public function getCouponsInWholeStore()
    {
        return $this->data['coupon'];
    }

    /**
     * @return null
     */
    public function getMyselfCouponByStatus()
    {
        return $this->data['coupon'];
    }
}