<?php

namespace app\admin\validate;
use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'  =>  'require|unique:article',
        'columnid' => 'require'
    ];
    
    protected $message  =   [
        'title.require' => '名称必填',
        'title.unique' => '名称不能重复',
        'columnid.require' => '所属栏目必选',  
    ];

}
