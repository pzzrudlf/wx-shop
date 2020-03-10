<?php


namespace app\admin\controller;


use app\admin\validate\AdminValidate;
use think\Exception;
use think\Request;
use app\admin\model\Admin as AdminModel;

class Admin extends Base
{
    //这个是要分页的
    public function index()
    {
        $start = $this->request->get('start');
        $length = $this->request->get('length');
//        $page = intval($start/$length) + 1;

        $admin = AdminModel::paginate(1);
        $this->assign('admin', $admin);
        return $this->fetch();
    }

    //查看记录
    public function view()
    {
        (new AdminValidate())->goCheck();
        $id = $this->request->param('id');
        $adminModel = AdminModel::get($id);
        if(empty($adminModel))
        {
            throw new Exception($adminModel->getError());
        }
        $this->assign('adminModel', $adminModel);
        return $this->fetch();
    }

    //创建记录。，然后跳转到查看页面
    public function create(Request $request)
    {
        $adminModel = new AdminModel();
        if($request->isPost())
        {
            (new AdminValidate())->goCheck();
            $params = $request->param();
            $adminModel->username = $params['username'];
            $adminModel->password=md5($params['password']);
            $id = $adminModel->isUpdate(false)->save();
            if(empty($id))
            {
                throw new Exception($adminModel->error);
            }
            $this->redirect(url('admin/view'), ['id' => $id], 200);
        }
        $this->assign('adminModel', $adminModel);
        return $this->fetch();
    }

    //编辑记录，然后跳转到查看页面
    public function edit()
    {

    }

    //删除记录，然后跳转到列表页
    public function delete()
    {
        if(!($this->request->isPost()))
        {
            $this->error('请使用post方法删除记录');
            return;
        }
        (new AdminValidate())->goCheck();
        $id = $this->request->param('id');
        $adminModel = AdminModel::get($id);
        if(empty($adminModel))
        {
            $this->error(`没有找到id号为{$id}的记录`);
            return;
        }
        $adminModel->delete();
        $this->redirect('admin/index', [], 200);
    }
}