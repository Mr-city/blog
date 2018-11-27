<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User;

class Login extends Controller
{
    public function index()
    {
        if(request()->ispost()){
            $user = new User();
            $data = input('post.');

            switch($user->isLogin($data)){
                case '1':
                    $this->success('信息正确','index/index');
                    break;
                case '3':
                    $this->error('验证码错误');
                    break;
                default:
                    $this->error('用户名或密码错误');
                    break;
            }
        }
        
        return $this->fetch();
    }

}
