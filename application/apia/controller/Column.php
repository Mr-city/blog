<?php
namespace app\apia\controller;
use app\apia\controller\Common;

class Column extends Common
{
    /**
     * 首页数据渲染
     * @return [type] [description]
     */
    public function index()
    {    
        $reData = [
            "total" => "0",
            "data" => []
        ];
        
        if (request()->isPost()) {
            // return 'post';
            $currentPage = input('currpage');
            $listRows = input('listrows');
            $reData['data'] = db('column')->page($currentPage,$listRows)->select();
            $reData['total'] = db('column')->count();
            return json_encode($reData);
        }else{
            return 'get';
        }
    }
    
    /**
     * 增加一条数据
     */
    public function add()
    {
        $reData = [
            "status" => "0",
            "msg" => "失败",
            "data" => []
        ];
        //判断是不是以POST方式提交过来
        if (request()->isPost()) {
            // return 'post';
            //获取参数
            $data = [
                "name" => input('name'),
            ];
            //验证
            $validate = new \app\admin\validate\column;
            if (!$validate->check($data)) {
                $reData['msg'] = $validate->getError();
                return json_encode($reData);
            }
            
            //往数据库添加数据
            if (db('column')->insert($data)) {
                $reData['status'] = '1';
                $reData['msg'] = '添加成功';
                return json_encode($reData);
            } else {
                $reData['msg'] = '添加失败';
                return json_encode($reData);
            }
        }else{
            return 'get';
        }
    }
    
    
    /**
     * 编辑用户界面
     * @return [type] [description]
     */
    public function edit()
    {
        $reData = [
            "status" => "0",
            "msg" => "失败",
            "data" => []
        ];
        //判断是不是以POST方式提交过来
        if (request()->isPost()) {
            //获取参数
            $data = [
                "id" => input('id'),
                "name" => input('name'),
            ];
            //验证
            $validate = new \app\admin\validate\column;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //修改数据
            if (db('column')->update($data)) {
                $reData['status'] = '1';
                $reData['msg'] = '修改成功';
                return json_encode($reData);
            } else {
                return json_encode($reData);
            }
            return;
        }
    }
    
    /**
     * [del description] 删除一条数据
     * @return [type] [description]
     */
    public function del()
    {
        $reData = [
            "status" => "0",
            "msg" => "删除失败",
            "data" => []
        ];
        $id = input('id');
        if (db('column')->delete($id)) {
            $reData['status'] = "1";
            $reData['msg'] = "删除成功";
            return json_encode($reData);
        } else {
            return json_encode($reData);
        }

    }
}
