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
                    新闻管理
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="{$url}news/newss" target="right">新闻管理</a></dd>
                    <dd><a href="{$url}news/addNew" target="right">添加新闻</a></dd>
                    <dd><a href="{$url}news/newNathar" target="right">新闻性质</a></dd>
                    <dd><a href="{$url}news/Carousel" target="right">轮播图</a></dd>
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