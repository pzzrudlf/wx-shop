<?php


namespace app\admin\controller;


use think\Controller;
use think\Session;

class Logout extends Controller
{
    public function index()
    {
        Session::clear(null);
        $this->redirect('/admin/login/index');
    }
}