<?php
namespace app\api\controller;

use app\api\controller\Common;
use app\admin\model\Article as ArticleModel;
use think\Request;

class Article extends Common
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
            $reData['data'] = db('article')->alias("a")->join('column c','c.cid = a.columnid')->page($currentPage,$listRows)->order("a.time","desc")->select();
            $reData['total'] = db('article')->count();
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
            //获取参数
            $data = [
                "title" => input('title'),
                "author" => input('author'),
                "desc" => input('desc'),
                "keywords" => input('keywords'),
                "content" => input('content'),
                "click" => input('click'),
                "state" => input('state'),
                "time" => time(),
                "columnid" => input('columnid'),
                "pic" => input('pic'),
            ];
            
            //验证
            $validate = new \app\admin\validate\article;
            if (!$validate->check($data)) {
                $reData['msg'] = $validate->getError();
                return json_encode($reData);
            }
            
            //往数据库添加数据
            if (db('article')->insert($data)) {
                $reData['status'] = '1';
                $reData['msg'] = '添加成功';
                return json_encode($reData);
            } else {
                $reData['msg'] = '添加失败';
                return json_encode($reData);
            }
            return;
        }
        
        $columns = db('column')->select();
        return json_encode($columns);
    }
    
    
    // 文件上传提交
    public function upload()
    {
        // 获取表单上传文件
        $file = request()->file('files');
        
        if (empty($file)) {
            $this->error('请选择上传文件');
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move('../public/static/uploads'); //存入uploads
        if ($info) {
            // $this->success('文件上传成功');
            return $info->getSaveName ();
        } else {
            // 上传失败获取错误信息
            $this->error($file->getError());
        }
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
                "author" => input('author'),
                "desc" => input('desc'),
                "keywords" => input('keywords'),
                "content" => input('content'),
                "click" => input('click'),
                "time" => time(),
                "columnid" => input('columnid'),
                "pic" => input('pic'),
                "state" => input('state'),
            ];
            
            //验证
            $validate = new \app\admin\validate\article;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('article')->update($data)) {
                $reData['status'] = '1';
                $reData['msg'] = '修改成功';
                return json_encode($reData);
            } else {
                $reData['msg'] = '修改失败';
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
        if (db('article')->delete($id)) {
            $reData['status'] = "1";
            $reData['msg'] = "删除成功";
            return json_encode($reData);
        } else {
            return json_encode($reData);
        }
    }
}
