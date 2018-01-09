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
                <a style="text-decoration:none" onclick="top.left.location='{$url}role/left';top.right.location='{$url}role/index';">
                    角色管理
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="{$url}role/index" target="right">人物列表</a></dd>
                    <dd><a href="{$url}role/addRole" target="right">角色添加</a></dd>
                    <dd><a href="{$url}role/camp" target="right">阵营列表</a></dd>
                    <dd><a href="{$url}role/addcamp" target="right">添加阵营</a></dd>
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