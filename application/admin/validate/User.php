<?php

namespace app\admin\validate;
use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:25',
        'password'  =>  'require',
        'email' =>  'email',
    ];
    
    protected $message  =   [
        'name.require' => '名称必填',
        'password.require' => '密码必填',
        'email'        => '邮箱格式错误',    
    ];

}
