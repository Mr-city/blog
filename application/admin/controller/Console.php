<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Console extends Common
{
    public function index()
    {
        return $this->fetch();
    }

}
