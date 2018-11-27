<?php
namespace app\admin\model;
use think\Model;

class User extends Model 
{
    
    /**
     * [isLogin description] 判断用户信息正确与否
     * @param  [type]  $data [description]
     * @return boolean       [description]
     */
    public function isLogin($data){
        // $captcha = new \think\captcha\Captcha();
        // if (!$captcha->check($data['code'])) {
        //     return 3;//验证码错误
        // }
        $user = db('user')->where('name',$data['name'])->find();
        if($user){
            if($user['password'] == md5($data['password'])){
                session('name',$user['name']);
                session('uid',$user['id']);
                return 1;//信息正确
            }else{
                return 2;//密码错误
            }
        }else{
            return 0;//用户不存在
        }
    }
}
