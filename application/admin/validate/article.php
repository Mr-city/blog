<?php

namespace app\admin\validate;
use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'  =>  'require',
        // 'url' =>  'require',
    ];
    
    protected $message  =   [
        'title.require' => '名称必填',
        // 'url.require'   => '连接必填',    
    ];

}
