<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Links extends Common
{
    /**
     * 首页数据渲染
     * @return [type] [description]
     */
    public function index()
    {
        $list = db('links')->paginate(10);
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
                "title" => input('title'),
                "url" => input('url'),
                "desc" => input('desc'),
            ];
            //验证
            $validate = new \app\admin\validate\Links;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('links')->insert($data)) {
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
                "title" => input('title'),
                "url" => input('url'),
                "desc" => input('desc'),
            ];
            
            //验证
            $validate = new \app\admin\validate\links;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('links')->update($data)) {
                return $this->success('成功！', 'index');
            } else {
                return $this->error('失败！');
            }
            return;
        }
        $id = input('id');
        $links = db('links')->find($id);
        $this->assign('links', $links);
        return $this->fetch();
    }
    
    /**
     * [del description] 删除一条数据
     * @return [type] [description]
     */
    public function del()
    {
        $id = input('id');
        if (db('links')->delete($id)) {
            return $this->success('成功！', 'index');
        } else {
            return $this->error('失败！');
        }
        
        // return $this->fetch();
    }
}
