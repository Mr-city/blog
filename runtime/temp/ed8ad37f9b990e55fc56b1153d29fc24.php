<?php /*a:2:{s:70:"/Applications/MAMP/htdocs/blog/application/admin/view/column/edit.html";i:1541926667;s:72:"/Applications/MAMP/htdocs/blog/application/admin/view/common/header.html";i:1542077104;}*/ ?>
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
        <div class="layui-row">
            <div class="layui-card">
                <div class="layui-card-header">修改友情连接</div>
                <form class="layui-form layui-card-body" enctype="multipart/form-data" action="<?php echo url('column/edit'); ?>" Method='post'>
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" value="<?php echo htmlentities($column['name']); ?>" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux lay-red">*</div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-blue" lay-submit lay-filter="formDemo">修改</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            <a href="<?php echo url('column/index'); ?>"><button style="margin-left:10px;" type="button" class="layui-btn layui-btn-primary close-item">关闭</button>
                            <input type="hidden" name="id" value="<?php echo htmlentities($column['id']); ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/blog/public/static/admin/assets/layui.all.js"></script>
    <script>
        var form = layui.form,
            layer = layui.layer,
            $ = layui.jquery;

        $('.close-item').click(function(event) {
            parent.layer.closeAll();
        });
    </script>
</body>

</html>
