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
                <li class="layui-nav-item ">
                        <a style="text-decoration:none" onclick="top.left.location='{$url}news/newTwo';top.right.location='{$url}news/newss';">
                                新闻管理
                        </a>
                </li>
                <li class="layui-nav-item">
                        <a  style="text-decoration:none" onclick="top.left.location='{$url}system/left';top.right.location='{$url}system/index';">
                                系统管理
                        </a>
                </li>
                <li class="layui-nav-item">
                        <a style="text-decoration:none" onclick="top.left.location='{$url}Navigation/homePage';top.right.location='{$url}Navigation/index';">
                                导航设置</a>
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
                <li class="layui-nav-item">
                        <a href="{$url}userPass/my" target="right">
                                我的账号
                        </a>
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