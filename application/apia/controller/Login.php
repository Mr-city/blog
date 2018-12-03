<?php
namespace app\apia\controller;
use think\Controller;
use app\admin\model\User;

class Login extends Controller
{
    public function index()
    {
        $resData = [
            "status" => "0",
            "msg" => "失败",
            "data" => []
        ];
        if(request()->ispost()){
            $user = new User();
            $data = input('post.');
            
            switch($user->isLogin($data)){
                case '1':
                    $resData['status'] = '1';
                    $resData['msg'] = '登录成功';
                    // session('name',$data.name);
                    return json_encode($resData);
                    break;
                case '3':
                    $resData['msg'] = '验证码错误';
                    return json_encode($resData);
                    break;
                default:
                    $resData['msg'] = '用户名或密码错误';
                    return json_encode($resData);
                    break;
            }
        }else{
            return 'get';
        }
        
        // return $this->fetch();
    }

}
