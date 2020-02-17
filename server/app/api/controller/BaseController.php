<?php
namespace app\api\controller;

use think\Controller;
use think\Request;

class BaseController extends Controller
{
    /**
     * @param Request $request
     * @description 四种获取请求对象的方法
     */
    private function usage(Request $request)
    {
        $data = $request->param();
        $data = $this->request->param();
        $data = request()->param();
        $data = Request::instance()->param();
        // 此时获取的是全部的变量值（路由中的参数id,url中查询字符串的值，post中body的变量值）
//        $all_data = $request->param();
        // 此时获取的是id变量值
//        $route_data = $request->route();
        // 此时获取的是url中查询字符串的变量值
//        $get_data = $request->get();
        // post提交的参数
//        $post_data = $request->post();
    }

}
