<?php /* Smarty version 2.6.31, created on 2017-12-26 10:19:45
         compiled from two/role.tpl */ ?>
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
role/left';top.right.location='<?php echo $this->_tpl_vars['url']; ?>
role/index';">
                    角色管理
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo $this->_tpl_vars['url']; ?>
role/index" target="right">人物列表</a></dd>
                    <dd><a href="<?php echo $this->_tpl_vars['url']; ?>
role/addRole" target="right">角色添加</a></dd>
                    <dd><a href="<?php echo $this->_tpl_vars['url']; ?>
role/camp" target="right">阵营列表</a></dd>
                    <dd><a href="<?php echo $this->_tpl_vars['url']; ?>
role/addcamp" target="right">添加阵营</a></dd>
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