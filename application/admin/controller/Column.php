<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Column extends Common
{
    /**
     * 首页数据渲染
     * @return [type] [description]
     */
    public function index()
    {
        $list = db('column')->paginate(10);
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
            ];
            //验证
            $validate = new \app\admin\validate\column;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('column')->insert($data)) {
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
                "name" => input('name')
            ];
            //验证
            $validate = new \app\admin\validate\column;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('column')->update($data)) {
                return $this->success('成功！', 'index');
            } else {
                return $this->error('失败！');
            }
            return;
        }
        $id = input('id');
        $column = db('column')->find($id);
        $this->assign('column', $column);
        return $this->fetch();
    }
    
    /**
     * [del description] 删除一条数据
     * @return [type] [description]
     */
    public function del()
    {
        $id = input('id');
        if (db('column')->delete($id)) {
            return $this->success('成功！', 'index');
        } else {
            return $this->error('失败！');
        }

        
        // return $this->fetch();
    }
}
