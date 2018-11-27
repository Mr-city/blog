<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        arry = [
            "name" => "小王",
            "name" => "小王",
        ];
        return \json_encode(arry);
    }

}
