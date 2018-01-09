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
        <th lay-data="{field:'username', width:80}">名称</th>
        <th lay-data="{field:'username', width:80}">权限</th>
        <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
    {/literal}
    {foreach from=$grade item="val" key="key"}
        <tr>
            {literal}
                <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
            {/literal}
            <form action="{$url}auth/change" method="post">
                <td>{$key+1}</td>
                <td>{$val.gName}</td>
                <td>
                    {foreach from=$allow item='all'}
                        {if $all.gID==$val.gID}
                            {$all.name}
                        {/if}
                    {/foreach}
                </td>
                <td>
                    {if $val.gName!='超级管理员'}
                        <a href="#" name="take" class="layui-btn layui-btn-xs">
                            分配
                        </a><input type="hidden" value="{$val.gID}">
                    {else}
                        不可更改
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
        $('a[name="take"]').click(function(){
            var gID = $(this).next().val();
            //console.log(gName);
            layer.open({
                type:2,
                area:['500px','300px'],
                title:'分配',
                shade:0.6,
                anim:2,
                {/literal}
                content: '{$url}auth/take/'+gID,
                {literal}
                btn:['submit'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var arr = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("have").childNodes;
                    //console.log(name);
                    name=JSON.stringify(takes(arr));
                    console.log(name);
                    $.ajax({
                        {/literal}
                        url:'{$url}auth/changeAuth',
                        {literal}
                        type:'POST', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        data:{'name':name,'gID':gID},
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
        function takes(arr){
            var arrs = new Array();
            for(var i=0;i<arr.length;i++){
                if(arr[i].nodeName == 'OPTION'){
                    arrs.push(arr[i]);
                }
            }
            //console.log(arrs);
            var narr=new Array();
            $(arrs).each(function(){
                narr.push($(this).val());
            });
            return narr;
        }
    })
    {/literal}
</script>
</body>
</html>