<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div style="margin-bottom: 5px;">
    <a href="#" id="add" class="layui-btn">添加新网站信息</a>
    <!-- 示例-970 -->
    <ins class="adsbygoogle" style="display:inline-block;width:970px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620"></ins>

</div>

{literal}

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
        <th lay-data="{field:'id', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:'username', width:80}">NAME</th>
        <th lay-data="{field:'sex', width:80, sort: true}">VALUE</th>
        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
    {/literal}
    {foreach from=$Systembar item='bar' key='key'}
        <tr>
            {literal}
                <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
            {/literal}
            <form action="{$url}system/changeSystem" method="post">
                <input type="hidden" name="sbID" value="{$bar.sbID}">
                <th>{$key+1}</th>
                <th>{$bar.sbName}</th>
                <td>
                    {if $System==array()}
                        没有任何数据!
                    {else}
                        {foreach from=$System item="val"}
                            {if $val.sbID==$bar.sbID}
                                {$val.sVal}
                            {else}

                            {/if}
                        {/foreach}
                    {/if}
                </td>
                <td>
                    <input type="text" name="System" value="">
                    <input type="submit" value="修改" class="layui-btn layui-btn-xs">
                    {if $key>7}
                    <a href="{$url}system/dropAll/{$val.sbID}" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                        删除
                    </a>
                    {/if}
                </td>
            </form>
        </tr>
    {/foreach}
    </thead>
</table>

<script src="{$jsUrl}jquery.js"></script>
<script src="{$jsUrl}layer/layer.js"></script>
<script>
    {literal}
    $(document).ready(function(){
        $('#add').click(function(){
            layer.open({
                type:2,
                area:['500px','300px'],
                title:'添加',
                shade:0.6,
                anim:2,
                {/literal}
                content: '{$url}system/temp1',
                {literal}
                btn:['submit'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var name = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("name").value;
                    var newP = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("pass").value;
                    $.ajax({
                        {/literal}
                        url:'{$url}system/system',
                        {literal}
                        type:'POST', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        data:{'pass':newP,'name':name},
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
                        error:function(){
                            console.log('错误')
                        }
                    });
                    layer.close();

                }

            })
        });
    })
    {/literal}
</script>
</body>
</html>