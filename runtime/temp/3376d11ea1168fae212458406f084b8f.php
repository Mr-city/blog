<?php /*a:2:{s:71:"/Applications/MAMP/htdocs/blog/application/admin/view/article/edit.html";i:1541938398;s:72:"/Applications/MAMP/htdocs/blog/application/admin/view/common/header.html";i:1541656897;}*/ ?>
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
                <div class="layui-card-header">修改文章</div>
                <form class="layui-form layui-card-body" enctype="multipart/form-data" action="<?php echo url('article/edit'); ?>" Method='post'>
                    <div class="layui-form-item">
                        <label class="layui-form-label">文章标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" value="<?php echo htmlentities($article['title']); ?>" style="width: 60%;" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                            <!-- <div class="layui-form-mid layui-word-aux lay-red">*</div> -->
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">文章作者</label>
                        <div class="layui-input-inline">
                            <input type="text" name="author" value="<?php echo htmlentities($article['author']); ?>"  placeholder="请输入文章作者" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">关键字</label>
                        <div class="layui-input-inline">
                            <input type="text" name="keywords" value="<?php echo htmlentities($article['keywords']); ?>"  placeholder="请输入关键字" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">文章描述</label>
                        <div class="layui-input-block">
                            <textarea name="desc" style="width: 60%;" placeholder="请输入描述内容" class="layui-textarea"><?php echo htmlentities($article['desc']); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">缩略图</label>
                        <div class="layui-upload">
                            <input type="file" name="pic"/>    
                        </div>
                        <div class="layui-input-block">
                            <?php if($article['pic'] != ''): ?>
                            <img src="/blog/public/static/uploads/<?php echo htmlentities($article['pic']); ?>" width="120" alt="">
                            <?php else: ?>
                            暂无缩略图
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否推荐</label>
                        <div class="layui-input-block">
                            <?php if($article['title'] == '1'): ?>
                            <input type="checkbox" checked name="state" lay-skin="switch" lay-text="ON|OFF">
                            <?php else: ?>
                            <input type="checkbox" name="state" lay-skin="switch" lay-text="ON|OFF">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属栏目</label>
                        <div class="layui-input-inline">
                            <select name="columnid">
                                <?php if(is_array($columns) || $columns instanceof \think\Collection || $columns instanceof \think\Paginator): $i = 0; $__LIST__ = $columns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option <?php if($vo['id'] == $article['columnid']): ?>selected<?php endif; ?> value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['name']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">文章内容</label>
                        <div class="layui-input-block">
                            <textarea id="editor" name="content" style="height: 300px;"><?php echo htmlentities($article['content']); ?></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-blue" lay-submit lay-filter="formDemo">新增</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            <a href="<?php echo url('article/index'); ?>"><button type="button" class="layui-btn layui-btn-primary close-item">关闭</button></a>
                            <input type="hidden" name="id" value="<?php echo htmlentities($article['id']); ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/blog/public/static/admin/assets/layui.all.js"></script>
    <script src="/blog/public/static/admin/ueditor/ueditor.config.js"></script>
    <script src="/blog/public/static/admin/ueditor/ueditor.all.min.js"></script>
    <script src="/blog/public/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>

    <script>
        var ue = UE.getEditor('editor');
        var form = layui.form,
            layer = layui.layer,
            $ = layui.jquery;

        $('.close-item').click(function(event) {
            parent.layer.closeAll();
        });
    </script>
</body>

</html>
