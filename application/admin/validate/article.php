<?php

namespace app\admin\validate;
use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'  =>  'require',
        'columnid' => 'require'
        // 'url' =>  'require',
    ];
    
    protected $message  =   [
        'title.require' => '名称必填',
        'columnid.require' => '所属栏目必选',
        // 'url.require'   => '连接必填',    
    ];

}
