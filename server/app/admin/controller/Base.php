<?php


namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    const SESSION_KEY = 'admin_id';
    protected $admin = null;
    protected $menu = [];
    public function _initialize()
    {
        if(!$this->isLogin())
        {
            //没有登陆
            $this->redirect('/admin/auth/login');
        }
        //登陆成功
        $admin_id = session(self::SESSION_KEY);
        $this->admin = $this->getAdminWithPermision($admin_id);
        // 菜单初始化
        $this->menu = $this->getMenuByAdmin($admin_id);
    }

    private function isLogin()
    {
        if(session(self::SESSION_KEY)){
            return true;
        }
        return false;
    }

    private function getMenuByAdmin($admin_id)
    {
        return [];
    }

    private function getAdminWithPermision($admin_id)
    {
        return [];
    }
}