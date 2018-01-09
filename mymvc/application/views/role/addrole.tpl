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
    <legend>角色添加</legend>
</fieldset>

<form class="layui-form" action="{$url}role/addRole" method="post" enctype="multipart/form-data">
    <div class="layui-form-item">
        <label class="layui-form-label">舰船名称</label>
        <div class="layui-input-inline">
            <input type="text" name="mName" lay-verify="required" value="{$mName}" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">英文名称</label>
        <div class="layui-input-inline">
            <input type="text" name="mEnglishName" lay-verify="required" value="{$mEnglishName}" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">舰船级别</label>
        <div class="layui-input-inline">
            <input type="text" name="levalName" lay-verify="required" value="{$levalName}" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">舰船类型</label>
        <div class="layui-input-inline">
            <input type="text" name="modelName" lay-verify="required" value="{$modelName}" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">归属阵营</label>
            <div class="layui-input-inline">
                <select name="cID" lay-filter="aihao">
                    {foreach from=$camp item="val"}
                        <option value="{$val.cID}" {if $val.cID==$cID}selected{/if}>{$val.cName}</option>
                    {/foreach}
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">作者</label>
        <div class="layui-input-inline">
            <input type="text" name="author" lay-verify="required" value="{$author}" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">舰娘生辰</label>
            <div class="layui-input-block">
                <input type="text" name="birthday" id="date1" value="{$birthday}" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-block">
                <input type="file" name="mImg">
                <div class="layui-upload-list">
                    <img class="layui-upload-img" id="demo1" src="{$url}static/rol/{$mImg}" alt="图片">
                </div>
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
<script src="{$layUrl}layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    {literal}
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date'
        });
        laydate.render({
            elem: '#date1'
        });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return '标题至少得5个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });

        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听提交
        form.on('submit(demo1)', function(data){
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
        });


    });
    {/literal}
</script>

</body>
</html>