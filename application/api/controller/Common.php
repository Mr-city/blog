<?php
namespace app\api\controller;
use think\Controller;

class Common extends Controller
{
    
    /**
     * 判断用户有没有登录
     * @return [type] [description]
     */
    protected function initialize()
    {
        $resData = [
            "status" => "-1",
            "msg" => "请登录",
        ];
        if(!session('name')){
          json($resData)->send();
           exit();
        }
    }

}
