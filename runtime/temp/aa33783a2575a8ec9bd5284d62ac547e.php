<?php /*a:2:{s:71:"/Applications/MAMP/htdocs/blog/application/admin/view/column/index.html";i:1541867793;s:72:"/Applications/MAMP/htdocs/blog/application/admin/view/common/header.html";i:1542077104;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/blog/public/static/admin/assets/css/layui.css">
    <link rel="stylesheet" href="/blog/public/static/admin/assets/css/admin.css">
    <link rel="stylesheet" href="/blog/public/static/admin/assets/css/view.css"/>
    <link rel="icon" href="/favicon.ico">
    <title>管理后台</title>
</head>


<body class="layui-view-body">
    <div class="layui-content">
        <div class="layui-page-header">
            <div class="pagewrap">
                <span class="layui-breadcrumb">
                    <a href="">首页</a>
                    <a href="">系统</a>
                    <a><cite>友情连接</cite></a>
                </span>
                <h2 class="title">友情连接</h2>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-card">
                <div class="layui-card-body">
                    <div class="form-box">
                        <button class="layui-btn layui-btn-blue add-item"><i class="layui-icon">&#xe654;</i>新增</button>
                        <table class="layui-table" lay-even="" lay-skin="line">
                            <colgroup>
                                <col width="80">
                                <col width="">
                                <col width="80">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>栏目名称</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$column): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo htmlentities($column['id']); ?></td>
                                    <td><?php echo htmlentities($column['name']); ?></td>
                                    <td>
                                        <div class="layui-table-cell laytable-cell-1-0-11"> 
                                            <a href="<?php echo url('column/edit',['id' => $column['id']]); ?>" class="layui-btn layui-btn-xs lay-vs" lay-event="edit">编辑</a> 
                                            <a href="<?php echo url('column/del',['id' => $column['id']]); ?>" class="layui-btn layui-btn-danger layui-btn-xs lay-hs" lay-event="del">删除</a> 
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                        <?php echo $list; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/blog/public/static/admin/assets/layui.all.js"></script>
    <script>
        var element = layui.element;
        var table = layui.table;
        var form = layui.form;
        var layer = layui.layer;
        var $ = layui.jquery;
        var laypage = layui.laypage;
        

        $('.add-item').click(function() {
            parent.index = layer.open({
                type: 2,
                title: '',
                area: ['100%', '100%'],
                content: '<?php echo url("column/add",["id"=>"1"]); ?>',
            });
        })
    </script>


</body>

</html>
