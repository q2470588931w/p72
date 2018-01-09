<?php /* Smarty version 2.6.31, created on 2017-12-26 10:17:05
         compiled from one/top.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><img src="<?php echo $this->_tpl_vars['imgUrl']; ?>
logo.png" alt="暂无logo" style="width: 140px;height: 50px"></div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
admin/left';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
admin/indexi';">
                    首页
                </a></li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
Navigation/homePage';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
Navigation/index';">
                    设置导航栏
                </a>
            </li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
news/newTwo';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
news/newss';">
                    资讯
                </a>
            </li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
system/left';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
system/index';">
                    系统
                </a>
            </li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
user/left';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
user/index';">
                    人员管理
                </a>
            </li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
role/left';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
role/index';">
                    角色管理
                </a>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="<?php echo $this->_tpl_vars['imgUrl']; ?>
touxiang.png" class="layui-nav-img">
                    <?php echo $this->_tpl_vars['name']; ?>

                </a>
            </li>
            <li class="layui-nav-item"><a href="<?php echo $this->_tpl_vars['url']; ?>
adminLogin/quit" target="_top">退了</a></li>
        </ul>
    </div>
</div>
<script src="<?php echo $this->_tpl_vars['layUrl']; ?>
layui.js"></script>
<script>
    <?php echo '
    //JavaScript代码区域
    layui.use(\'element\', function(){
        var element = layui.element;

    });
    '; ?>

</script>
</body>
</html>