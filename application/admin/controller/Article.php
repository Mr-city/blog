<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Article as ArticleModel;

class Article extends Common
{
    /**
     * 首页数据渲染
     * @return [type] [description]
     */
    public function index()
    {
        // $list = db('article')->paginate(10);
        $list = ArticleModel::paginate(5);
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
                "author" => input('author'),
                "desc" => input('desc'),
                "keywords" => input('keywords'),
                "content" => input('content'),
                "click" => input('click'),
                "time" => time(),
                "columnid" => input('columnid')
            ];
            
            if(input('state') == 'on'){
                $data['state']=1;
            }
            
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic'); //获取传过来的图片
                $info = $file->move( '../public/static/uploads'); //存入uploads
                $data['pic'] = $info->getSaveName(); //取得保存路径
            }
            
            //验证
            $validate = new \app\admin\validate\article;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('article')->insert($data)) {
                return $this->success('成功！', 'index');
            } else {
                return $this->error('失败！');
            }
            return;
        }
        
        $columns = db('column')->select();
        $this->assign('columns',$columns);
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
                "author" => input('author'),
                "desc" => input('desc'),
                "keywords" => input('keywords'),
                "content" => input('content'),
                "click" => input('click'),
                "time" => time(),
                "columnid" => input('columnid')
            ];
            
            
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic'); //获取传过来的图片
                $info = $file->move( '../public/static/uploads'); //存入uploads
                $data['pic'] = $info->getSaveName(); //取得保存路径
            }
            
            if(input('state') == 'on'){
                $data['state']=1;
            }
            
            //验证
            $validate = new \app\admin\validate\article;
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                return;
            }
            
            //往数据库添加数据
            if (db('article')->update($data)) {
                return $this->success('成功！', 'index');
            } else {
                return $this->error('失败！');
            }
            return;
        }
        $id = input('id');
        $article = db('article')->find($id);
        $this->assign('article', $article);
        
        $columns = db('column')->select();
        $this->assign('columns',$columns);
        return $this->fetch();
    }
    
    /**
     * [del description] 删除一条数据
     * @return [type] [description]
     */
    public function del()
    {
        $id = input('id');
        if (db('article')->delete($id)) {
            return $this->success('成功！', 'index');
        } else {
            return $this->error('失败！');
        }
        
        // return $this->fetch();
    }
}
