<?php /* Smarty version 2.6.31, created on 2017-12-26 10:17:05
         compiled from two/left.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css">
</head>
<body class="layui-layout-body">
    <div class="layui-side layui-bg-black" name="left">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item ">
                        <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
news/newTwo';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
news/newss';">
                                新闻管理
                        </a>
                </li>
                <li class="layui-nav-item">
                        <a  style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
system/left';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
system/index';">
                                系统管理
                        </a>
                </li>
                <li class="layui-nav-item">
                        <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
Navigation/homePage';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
Navigation/index';">
                                导航设置</a>
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
                <li class="layui-nav-item">
                        <a href="<?php echo $this->_tpl_vars['url']; ?>
userPass/my" target="right">
                                我的账号
                        </a>
                </li>
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