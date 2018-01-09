<link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
<table class="layui-table">
    <tr>
        <th>您现在使用的是：</th>
        <td>{$u_login.user}</td>

    </tr>
    <tr>
        <th>修改账号</th>
        <td><a href="#" id="user" class="layui-btn layui-btn-xs">修改</a></td>
    </tr>
    <tr>
        <th>你可以修改密码：</th>
        <td><a href="#" id="add" class="layui-btn layui-btn-xs">修改</a></td>
    </tr>
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
                title:'修改',
                shade:0.6,
                anim:2,
                {/literal}
                content: '{$url}userPass/temp1',
                {literal}
                btn:['submit'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var old = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("old").value;
                    var newP = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("new").value;
                    var newp2 = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("new2").value;
                    {/literal}
                    var rit = "{$u_login.pass}";
                    var url = "{$url}userPass/md5/"+old;
                    //console.log(url);
                     {literal}
                    var ret = true;
                    $.get(url,function(smg){
                        //console.log(smg);
                        if(smg!=rit){
                            ret=false;
                            alert(1);
                        }
                    },'text');
                    //console.log(ret);
                    if(!ret){
                        alert('密码不对');
                    }else {
                        if(newP!=newp2){
                            alert('两次密码不对');
                        }
                        else {
                            $.ajax({
                                {/literal}
                                url:'{$url}userPass/modify',
                                {literal}
                                type:'POST', //GET
                                async:true,    //或false,是否异步
                                timeout:5000,    //超时时间
                                data:{'pass':newP},
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
                    }
                }

            })
        });
        $('#user').click(function(){
            layer.open({
                type:2,
                area:['500px','300px'],
                title:'修改',
                shade:0.6,
                anim:2,
                {/literal}
                content: '{$url}userPass/temp2',
                {literal}
                btn:['submit'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var old = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("old").value;
                    var newP = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("new").value;
                    {/literal}
                    var rit = "{$u_login.pass}";
                    var url = "{$url}userPass/md5/"+old;
                    //console.log(url);
                    {literal}
                    var ret = true;
                    $.get(url,function(smg){
                        //console.log(smg);
                        if(smg!=rit){
                            ret=false;
                            alert(1);
                        }
                    },'text');
                    //console.log(ret);
                    if(!ret){
                        alert('密码不对');
                    }else {
                            $.ajax({
                                {/literal}
                                url:'{$url}userPass/modify',
                                {literal}
                                type:'POST', //GET
                                async:true,    //或false,是否异步
                                timeout:5000,    //超时时间
                                data:{'name':newP},
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
                }

            })
        })
    })
    {/literal}
</script>

