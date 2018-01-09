<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>阵营管理</legend>
</fieldset>

<form class="layui-form" action="{$url}role/addcamp" method="post" enctype="multipart/form-data">
    <div class="layui-form-item">
        <label class="layui-form-label">阵营名称</label>
        <div class="layui-input-inline">
            <input type="text" name="cName" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">英文名称</label>
        <div class="layui-input-inline">
            <input type="text" name="cEnglishName" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">图标上传</label>
            <div class="layui-input-block">
                <input type="file" name="cImg" id="date1" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>



    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="submit" value="提交" class="layui-btn">
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</body>
</html>