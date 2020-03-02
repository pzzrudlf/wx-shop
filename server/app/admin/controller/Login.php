<?php


namespace app\admin\controller;

use think\Controller;
use app\admin\validate\AuthValidate;
use app\admin\model\Admin as AdminModel;

class Login extends Controller
{
    const SESSION_KEY = 'admin_id';

    public function index()
    {
        if(session(self::SESSION_KEY))
        {
            $this->success('已经登陆', '/admin/index/index');
        }

        if (request()->isPost())
        {
            (new AuthValidate)->goCheck();
            $username = request()->post('username');
            $password = request()->post('password');
            $password = md5($password);

            $admin = AdminModel::get(function($query) use ($username, $password){
               $query->where(['username' => $username, 'password' => $password]);
            });

            if(empty($admin))
            {
                $this->error('账号有误，请重新填写账号密码！');
            }
            session(null);
            session(self::SESSION_KEY, $admin->id);
            $this->redirect('/admin/index/index');
        }
        return $this->fetch();
    }

}