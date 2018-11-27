<?php

namespace app\admin\validate;
use think\Validate;

class Column extends Validate
{
    protected $rule = [
        'name'  =>  'require|unique:column',
    ];
    
    protected $message  =   [
        'name.require' => '名称必填',
        'name.unique' => '名称不能重复',
   
    ];

}
