<?php /* Smarty version 2.6.31, created on 2017-12-26 10:19:38
         compiled from two/newTwo.tpl */ ?>
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
            <li class="layui-nav-item layui-nav-itemed">
                <a style="text-decoration:none" onclick="top.left.location='<?php echo $this->_tpl_vars['url']; ?>
news/newTwo';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
news/newss';">
                    新闻管理
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo $this->_tpl_vars['url']; ?>
news/newss" target="right">新闻管理</a></dd>
                    <dd><a href="<?php echo $this->_tpl_vars['url']; ?>
news/addNew" target="right">添加新闻</a></dd>
                    <dd><a href="<?php echo $this->_tpl_vars['url']; ?>
news/newNathar" target="right">新闻性质</a></dd>
                    <dd><a href="<?php echo $this->_tpl_vars['url']; ?>
news/Carousel" target="right">轮播图</a></dd>
                </dl>
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