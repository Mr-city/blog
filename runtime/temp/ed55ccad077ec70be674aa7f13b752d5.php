<?php /*a:2:{s:67:"/Applications/MAMP/htdocs/blog/application/admin/view/user/add.html";i:1541738937;s:72:"/Applications/MAMP/htdocs/blog/application/admin/view/common/header.html";i:1542077104;}*/ ?>
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
                <div class="layui-card-header">新增用户</div>
                <form class="layui-form layui-card-body" action="<?php echo url('user/add'); ?>" Method='post'>
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" required lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux lay-red">*</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux lay-red">*</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所在城市</label>
                        <div class="layui-input-inline">
                            <select name="city[]">
                                <option value="">请选择省</option>
                                <option value="四川" selected="">四川省</option>
                                <option value="浙江" selected="">浙江省</option>
                                <option value="江西">江西省</option>
                                <option value="福建">福建省</option>
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <select name="city[]">
                                <option value="">请选择市</option>
                                <option value="杭州">杭州</option>
                                <option value="成都">成都</option>
                                <option value="宁波" disabled="">宁波</option>
                                <option value="温州">温州</option>
                                <option value="温州">台州</option>
                                <option value="温州">绍兴</option>
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <select name="city[]">
                                <option value="">请选择县/区</option>
                                <option value="高新区">高新区</option>
                                <option value="西湖区">西湖区</option>
                                <option value="余杭区">余杭区</option>
                                <option value="拱墅区">临安市</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">性别</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="男" title="男" checked>
                            <input type="radio" name="sex" value="女" title="女">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email"  placeholder="请输入标题" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">个性签名</label>
                        <div class="layui-input-block">
                            <input type="text" name="signature" placeholder="请输入标题" autocomplete="off" class="layui-input">
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
