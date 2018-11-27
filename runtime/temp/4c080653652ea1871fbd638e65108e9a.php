<?php /*a:1:{s:70:"/Applications/MAMP/htdocs/blog/application/admin/view/login/index.html";i:1541944438;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/blog/public/static/admin/assets/css/layui.css">
    <link rel="stylesheet" href="/blog/public/static/admin/assets/css/login.css">
    <link rel="icon" href="/favicon.ico">
    <title>管理后台</title>
</head>
<body class="login-wrap">
    <div class="login-container">
        <form class="login-form" action="<?php echo url('login/index'); ?>" method="post">
            <h3>博客管理系统</h3>
            <div class="input-group">
                <input type="text" id="username" name="name" placeholder="用户名" class="input-field">
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="密码" class="input-field">
            </div>
            <div class="input-group">
                <input type="text" id="code" name="code" placeholder="验证码" class="input-field">
                <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>'"/>
            </div>
            <button type="submit" class="login-button">登录<i class="ai ai-enter"></i></button>
        </form>
    </div>
</body>
<!-- <script src="/blog/public/static/admin/assets/layui.js"></script> -->
<!-- <script src="/blog/public/static/admin/assets/js/index.js" data-main="home"></script> -->
</html>
