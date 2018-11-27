<?php /*a:2:{s:68:"/Applications/MAMP/htdocs/blog/application/admin/view/links/add.html";i:1541862826;s:72:"/Applications/MAMP/htdocs/blog/application/admin/view/common/header.html";i:1541656897;}*/ ?>
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
                <div class="layui-card-header">新增友情连接</div>
                <form class="layui-form layui-card-body" action="<?php echo url('links/add'); ?>" Method='post'>
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux lay-red">*</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">连接</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" required lay-verify="required" placeholder="请输入连接" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux lay-red">*</div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">描述</label>
                        <div class="layui-input-block">
                            <textarea name="desc" style="width: 60%;" placeholder="请输入描述内容" class="layui-textarea"></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-blue" lay-submit lay-filter="formDemo">新增</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            <button type="reset" class="layui-btn layui-btn-primary close-item">关闭</button>
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
