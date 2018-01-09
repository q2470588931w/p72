<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div style="margin-bottom: 5px;">

    <!-- 示例-970 -->
    <ins class="adsbygoogle" style="display:inline-block;width:970px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620"></ins>

</div>

{literal}

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
        <th lay-data="{field:'id', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:'username', width:80}">角色名</th>
        <th lay-data="{field:'sex', width:80, sort: true}">作者</th>
        <th lay-data="{field:'city', width:80}">阵营</th>
        <th lay-data="{field:'city', width:80}">舰船级别</th>
        <th lay-data="{field:'city', width:80}">舰船型号</th>
        <th lay-data="{field:'city', width:80}">英文名</th>
        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
    {/literal}
    {foreach from=$role item='val' key='key'}
        <tr>
            <form action="{$url}role/addRole" method="post">
            {literal}
                <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
            {/literal}
            <td>{$key}</td>
                <input type="hidden" name="mID" value="{$val.mID}">
            <td><input type="text" value="{$val.mName}" name="mName"></td>
            <td><input type="text" value="{$val.author}" name="author"></td>
            <td>{$val.cName}</td>
            <td><input type="text" value="{$val.levalName}" name="levalName"></td>
            <td><input type="text" value="{$val.modelName}" name="modelName"></td>
            <td><input type="text" value="{$val.mEnglishName}" name="mEnglishName"></td>
            <td>
                <input type="submit" value="修改" class="layui-btn layui-btn-xs">
            </td>
            </form>
        </tr>
    {/foreach}
    </thead>
</table>

<script src="{$layUrl}layui.js" charset="utf-8"></script>

</body>
</html>