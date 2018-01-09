<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-side layui-bg-black" name="left">
    <div class="layui-side-scroll">
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <li class="layui-nav-item layui-nav-itemed">
                <a style="text-decoration:none" onclick="top.left.location='{$url}news/newTwo';top.right.location='{$url}news/newss';">
                    导航设置
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="{$url}Navigation/index" target="right">导航栏列表</a></dd>
                    <dd><a href="{$url}Navigation/addNavigation" target="right">添加导航栏</a></dd>
                    <dd><a href="{$url}Navigation/logo" target="right">logo管理</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>
<script src="{$layUrl}layui.js"></script>
<script>
    {literal}
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
    {/literal}
</script>
</body>
</html>