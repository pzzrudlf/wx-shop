<?php


namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    const SESSION_KEY = 'admin_id';
    protected $admin = null;
    protected $role = null;
    protected $menu = [];
    public function _initialize()
    {
        if(!$this->isLogin())
        {
            //用户没有登陆
            $this->redirect('/admin/login/index');
        }
        //用户登陆之后
        $admin_id = session(self::SESSION_KEY);
        //获取后台用户的角色
        $this->admin = $admin_id;
        $this->role = $this->getRole($admin_id);
        // 获取管理员有权限的菜单
        $this->menu = $this->getMenu($admin_id);
    }

    private function isLogin()
    {
        if(session(self::SESSION_KEY)){
            return true;
        }
        return false;
    }

    private function getMenu($admin_id)
    {
        return [];
    }

    private function getRole($admin_id)
    {
        return [];
    }
}