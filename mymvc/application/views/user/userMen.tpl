<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div style="margin-bottom: 5px;">

    <form action="{$url}user/adduser" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">添加一个</label>
            <div class="layui-input-inline">
                <input type="text" name="pName[]" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
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
        <th lay-data="{field:'username', width:80}">职位</th>
        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
    {/literal}
    {foreach from=$user item="val" key='key'}
        <tr>
            {literal}
                <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
            {/literal}
            <td>{$key+1}</td>
            <td>{$val.gName}</td>
            <td>
                {if $val.gName!='超级管理员'}
                    <a href="#" name="modify" class="layui-btn layui-btn-xs">
                        修改
                    </a><input type="hidden" value="{$val.gID}">

                    <a href="{$url}user/drop/{$val.gID}" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                        删除
                    </a>
                {else}
                    最高权限
                {/if}
            </td>
        </tr>
    {/foreach}
    </thead>
</table>

<script src="{$jsUrl}jquery.js"></script>
<script src="{$jsUrl}layer/layer.js"></script>
<script>
    {literal}
    $(document).ready(function(){
        $('a[name="modify"]').click(function(){
            var pid  = $(this).next().val();
            layer.open({
                type:2,
                area:['500px','300px'],
                title:'修改',
                shade:0.6,
                anim:2,
                {/literal}
                content: '{$url}user/temp1',
                {literal}
                btn:['submit'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var name = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("name").value;
                    $.ajax({
                        {/literal}
                        url:'{$url}user/modify',
                        {literal}
                        type:'POST', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        data:{'pName':name,'pid':pid},
                        dataType:'text',    //返回的数据格式：json/xml/html/script/jsonp/text
                        success:function(data){
                            if(data==1100){
                                layer.msg('修改成功');
                                setTimeout(function(){
                                    self.location.reload();//页面刷新
                                },1000);
                            }else {
                                alert(data);
                            }

                        },
                        error:function(xhr,textStatus){
                            console.log('错误')
                        }
                    });
                    layer.close();
                }
            })
        })
    })
    {/literal}
</script>
</body>
</html>