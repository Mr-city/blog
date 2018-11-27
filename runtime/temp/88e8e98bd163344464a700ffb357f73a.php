<?php /*a:2:{s:70:"/Applications/MAMP/htdocs/blog/application/admin/view/index/index.html";i:1541942611;s:72:"/Applications/MAMP/htdocs/blog/application/admin/view/common/header.html";i:1542077104;}*/ ?>
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

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header custom-header">
            
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item slide-sidebar" lay-unselect>
                    <a href="javascript:;" class="icon-font"><i class="ai ai-menufold"></i></a>
                </li>
            </ul>

            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;"><?php echo htmlentities(app('request')->session('name')); ?></a>
                    <dl class="layui-nav-child">
                        <dd><a href="">帮助中心</a></dd>
                        <dd><a href="<?php echo url('user/logout'); ?>">退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>

        <div class="layui-side custom-admin">
            <div class="layui-side-scroll">

                <div class="custom-logo">
                    <img src="/blog/public/static/admin/assets/images/logo.png" alt=""/>
                    <h1>Admin Pro</h1>
                </div>
                <ul id="Nav" class="layui-nav layui-nav-tree">
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="layui-icon">&#xe609;</i>
                            <em>主页</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo url('console/index'); ?>">控制台</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="layui-icon">&#xe66b;</i>
                            <em>栏目管理</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo url('column/index'); ?>">栏目列表</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="layui-icon">&#xe63c;</i>
                            <em>文章管理</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo url('article/index'); ?>">文章列表</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="layui-icon">&#xe857;</i>
                            <em>组件</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo url('form/index'); ?>">表单</a></dd>
                            <dd>
                                <a href="javascript:;">页面</a>
                                <dl class="layui-nav-child">
                                    <dd>
                                        <a href="login.html">登录页</a>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="layui-icon">&#xe612;</i>
                            <em>用户</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo url('user/index'); ?>">用户组</a></dd>
                            <dd><a href="views/operaterule.html">权限配置</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="layui-icon">&#xe614;</i>
                            <em>系统</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo url('links/index'); ?>">友情连接</a></dd>
                        </dl>
                    </li>
                </ul>

            </div>
        </div>

        <div class="layui-body">
             <div class="layui-tab app-container" lay-allowClose="true" lay-filter="tabs">
                <ul id="appTabs" class="layui-tab-title custom-tab"></ul>
                <div id="appTabPage" class="layui-tab-content"></div>
            </div>
        </div>

        <div class="layui-footer">
            <p>© 2018 初建：<a href="http://www.mycodes.net/" target="_blank">Mr.zhao 博客后台管理</a></p>
        </div>

        <div class="mobile-mask"></div>
    </div>
    <script src="/blog/public/static/admin/assets/layui.js"></script>
    <script src="/blog/public/static/admin/assets/js/index.js" data-main="home"></script>
</body>
</html>
