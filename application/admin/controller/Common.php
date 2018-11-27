<?php
namespace app\admin\controller;
use think\Controller;

class Common extends Controller
{
    
    /**
     * 判断用户有没有登录
     * @return [type] [description]
     */
    protected function initialize()
    {
        if(!session('name')){
            $this->error('请先登录','login/index');
        }
    }

}
