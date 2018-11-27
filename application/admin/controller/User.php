<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class User extends Common
{
    /**
     * 首页数据渲染
     * @return [type] [description]
     */
    public function index()
    {
        $list = db('user')->paginate(10);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        return $this->fetch();
    }
    
    /**
     * 增加一条数据
     */
    public function add()
    {
        
        //判断是不是以POST方式提交过来
        if (request()->isPost()) {
            //获取参数
            $data = [
                "name" => input('name'),
                "password" => md5(input('password')),
                "email" => input('email'),
                "signature" => input('signature'),
                "sex" => input('sex'),
                "city" => join(',', input('city'))
            ];
            // return json_decode($data)
            //验证
            $validate = new \app\admin\validate\User;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('user')->insert($data)) {
                return $this->success('成功！', 'index');
            } else {
                return $this->error('失败！');
            }
            return;
        }
        return $this->fetch();
    }
    
    
    /**
     * 编辑用户界面
     * @return [type] [description]
     */
    public function edit()
    {
        //判断是不是以POST方式提交过来
        if (request()->isPost()) {
            //获取参数
            $data = [
                "id" => input('id'),
                "name" => input('name'),
                "password" => md5(input('password')),
                "email" => input('email'),
                "signature" => input('signature'),
                "sex" => input('sex'),
                "city" => join(',', input('city'))
            ];
            //验证
            $validate = new \app\admin\validate\User;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('user')->update($data)) {
                return $this->success('成功！', 'index');
            } else {
                return $this->error('失败！');
            }
            return;
        }
        $id = input('id');
        $user = db('user')->find($id);
        $this->assign('user', $user);
        return $this->fetch();
    }
    
    /**
     * [del description] 删除一条数据
     * @return [type] [description]
     */
    public function del()
    {
        $id = input('id');
        if ($id != 1) {
            if (db('user')->delete($id)) {
                return $this->success('成功！', 'index');
            } else {
                return $this->error('失败！');
            }
        }
        
        // return $this->fetch();
    }
    
    public function logout(){
        session(null);
        $this->success('退出成功','login/index');
    }
}
