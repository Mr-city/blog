<?php

namespace app\admin\validate;
use think\Validate;

class Column extends Validate
{
    protected $rule = [
        'columnname'  =>  'require|unique:column',
    ];
    
    protected $message  =   [
        'columnname.require' => '名称必填',
        'columnname.unique' => '名称不能重复',
   
    ];

}
