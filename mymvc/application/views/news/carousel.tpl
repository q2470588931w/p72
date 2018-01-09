<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div style="margin-bottom: 5px;">

    <form action="{$url}news/Carousel" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <input type="button" value="多张" class="layui-form-label">
            <div class="layui-input-inline" id="jiaru">
                <input type="file" name="Carousel[]">
            </div>
        </div>
        <input type="submit" value="添加" class="layui-btn">
    </form>
</div>

{literal}

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
        <th lay-data="{field:'id', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:'username', width:80}">顺序</th>
        <th lay-data="{field:'sign', width:160}">图片</th>
        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
    {/literal}
    {foreach from=$Carousel item="val" key="key"}
        <tr>
            <form action="{$url}news/changeCarousel" method="post">
                {literal}
                    <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
                {/literal}
                <td>{$key+1}</td>
                <td><input type="number" value="{$val.corder}" min="0" name="order"></td>
                <td><img src="{$url}static/news/Carousel/{$val.cUrl}" alt="图片不见啦"></td>
                <input type="hidden" value="{$val.cID}" name="cID">

                <td>
                    <input type="submit" value="修改" class="layui-btn layui-btn-xs">
                    <a href="{$url}news/dropCarousel/{$val.cID}" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
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
        $('input[value="多张"]').click(function () {
            $('#jiaru').append('<input type="file" name="Carousel[]">');
        })
    })
    {/literal}
</script>
</body>
</html>