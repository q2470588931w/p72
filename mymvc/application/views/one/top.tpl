<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <link rel="stylesheet" href="{$layUrl}css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><img src="{$imgUrl}logo.png" alt="暂无logo" style="width: 140px;height: 50px"></div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='{$url}admin/left';top.right.location='{$url}admin/indexi';">
                    首页
                </a></li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='{$url}Navigation/homePage';top.right.location='{$url}Navigation/index';">
                    设置导航栏
                </a>
            </li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='{$url}news/newTwo';top.right.location='{$url}news/newss';">
                    资讯
                </a>
            </li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='{$url}system/left';top.right.location='{$url}system/index';">
                    系统
                </a>
            </li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='{$url}user/left';top.right.location='{$url}user/index';">
                    人员管理
                </a>
            </li>
            <li class="layui-nav-item">
                <a style="text-decoration:none" onclick="top.left.location='{$url}role/left';top.right.location='{$url}role/index';">
                    角色管理
                </a>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="{$imgUrl}touxiang.png" class="layui-nav-img">
                    {$name}
                </a>
            </li>
            <li class="layui-nav-item"><a href="{$url}adminLogin/quit" target="_top">退了</a></li>
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