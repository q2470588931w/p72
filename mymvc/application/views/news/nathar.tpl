<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div style="margin-bottom: 5px;">
    <form action="{$url}news/addNathar" method="post">
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
        <th lay-data="{field:'username', width:80}">性质</th>
        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
    {/literal}
    {foreach from=$nathar item="val" key='key'}
        <tr>
            {literal}
                <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
            {/literal}
            <td>{$key+1}</td>
            <td>{$val.nathar}</td>
            <td>
                <a href="{$url}news/dropNathar/{$val.naID}" onclick="return confirm('确定删除');"  class="layui-btn layui-btn-danger layui-btn-xs">
                    删除
                </a>
            </td>
        </tr>
    {/foreach}
    </thead>
</table>

<script src="{$layUrl}layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->


</body>
</html>