<?php
namespace app\admin\model;
use think\Model;

class Article extends Model 
{
    public function column()
    {
        return $this->belongsTo('column','columnid'); //关联查询
    }
}
