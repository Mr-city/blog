<?php /*a:2:{s:69:"/Applications/MAMP/htdocs/blog/application/admin/view/user/index.html";i:1541756574;s:72:"/Applications/MAMP/htdocs/blog/application/admin/view/common/header.html";i:1542077104;}*/ ?>
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
                    <a href="">用户</a>
                    <a><cite>用户组</cite></a>
                </span>
                <h2 class="title">用户组</h2>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-card">
                <div class="layui-card-body">
                    <div class="form-box">
                        <div class="layui-form layui-form-item">
                            <div class="layui-inline">
                                <div class="layui-form-mid">用户名:</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid">邮箱:</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid">性别:</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <select name="sex">
                                        <option value="1">男</option>
                                        <option value="2">女</option>
                                    </select>
                                </div>
                                <button class="layui-btn layui-btn-blue">查询</button>
                                <button class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                        <button class="layui-btn layui-btn-blue add-item"><i class="layui-icon">&#xe654;</i>新增</button>
                        <table class="layui-table" lay-even="" lay-skin="line">
                            <colgroup>
                                <col width="50">
                                <col width="150">
                                <col width="200">
                                <col width="100">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>姓名</th>
                                    <th>邮箱</th>
                                    <th>性别</th>
                                    <th>城市</th>
                                    <th>个性签名</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo htmlentities($user['id']); ?></td>
                                    <td><?php echo htmlentities($user['name']); ?></td>
                                    <td><?php echo htmlentities($user['email']); ?></td>
                                    <td><?php echo htmlentities($user['sex']); ?></td>
                                    <td><?php echo htmlentities($user['city']); ?></td>
                                    <td><?php echo htmlentities($user['signature']); ?></td>
                                    <td>
                                        <div class="layui-table-cell laytable-cell-1-0-11"> 
                                            <a href="<?php echo url('user/edit',['id' => $user['id']]); ?>" class="layui-btn layui-btn-xs lay-vs" lay-event="edit">编辑</a> 
                                            
                                            <?php if($user['id'] != 1): ?>
                                            <a href="<?php echo url('user/del',['id' => $user['id']]); ?>" class="layui-btn layui-btn-danger layui-btn-xs lay-hs" lay-event="del">删除</a> 
                                            <?php endif; ?>
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
                content: '<?php echo url("user/add",["id"=>"1"]); ?>',
            });
        })
    </script>


</body>

</html>
