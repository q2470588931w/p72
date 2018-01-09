<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div style="margin-bottom: 5px;">
    <form action="{$url}System/Systembar" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">添加一个</label>
            <div class="layui-input-inline">
                <input type="text" name="Systembar" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                <input type="submit" value="添加" class="layui-btn">
            </div>
        </div>
    </form>
</div>

{literal}

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
        <th lay-data="{field:'id', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:'username', width:80}">名称</th>
        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
    {/literal}
    {foreach from=$Systembar item="val" key="key"}
        <tr>
            {literal}
                <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
            {/literal}
            <form action="{$url}system/changes" method="post">
                <td>{$key+1}</td>
                <input type="hidden" value="{$val.sbID}" name="cID">
                <td><input type="text" value="{$val.sbName}" name="Systembar"></td>
                <td>
                    <input type="submit" value="修改" class="layui-btn layui-btn-xs">
                    <a href="{$url}news/dropAll/{$val.sbID}" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                        删除
                    </a>
                </td>
            </form>
        </tr>
    {/foreach}
    </thead>
</table>

<script src="{$layUrl}layui.js" charset="utf-8"></script>
<script src="{$jsUrl}jquery.js"></script>
<script>
    {literal}
    $(document).ready(function () {
        $('input[value="+"]').click(function () {
            $('#ppsaa').append('<input type="text" name="Systembar[]">');
        })
    })
    {/literal}
</script>
</body>
</html>