<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div style="margin-bottom: 5px;">

    <ins class="adsbygoogle" style="display:inline-block;width:970px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620"></ins>

</div>

{literal}

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
        <th lay-data="{field:'id', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:'username', width:80}">阵营</th>
        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
    {/literal}
    {foreach from=$camp item="val" key='key'}
        <tr>
            {literal}
                <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
            {/literal}
            <td>{$key+1}</td>
            <td>{$val.cName}</td>
            <td>
                <a href="{$url}role/dropcamp/{$val.cID}" onclick="return confirm('确定删除');"  class="layui-btn layui-btn-danger layui-btn-xs">
                    删除
                </a>
            </td>
        </tr>
    {/foreach}
    </thead>
</table>

</body>
</html>