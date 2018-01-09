<?php /* Smarty version 2.6.31, created on 2017-12-26 16:34:33
         compiled from myPass/my.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css"  media="all">
<table class="layui-table">
    <tr>
        <th>您现在使用的是：</th>
        <td><?php echo $this->_tpl_vars['u_login']['user']; ?>
</td>

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

<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.js"></script>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
layer/layer.js"></script>
<script>
    <?php echo '
    $(document).ready(function(){
        $(\'#add\').click(function(){
            layer.open({
                type:2,
                area:[\'500px\',\'300px\'],
                title:\'修改\',
                shade:0.6,
                anim:2,
                '; ?>

                content: '<?php echo $this->_tpl_vars['url']; ?>
userPass/temp1',
                <?php echo '
                btn:[\'submit\'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var old = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("old").value;
                    var newP = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("new").value;
                    var newp2 = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("new2").value;
                    '; ?>

                    var rit = "<?php echo $this->_tpl_vars['u_login']['pass']; ?>
";
                    var url = "<?php echo $this->_tpl_vars['url']; ?>
userPass/md5/"+old;
                    //console.log(url);
                     <?php echo '
                    var ret = true;
                    $.get(url,function(smg){
                        //console.log(smg);
                        if(smg!=rit){
                            ret=false;
                            alert(1);
                        }
                    },\'text\');
                    //console.log(ret);
                    if(!ret){
                        alert(\'密码不对\');
                    }else {
                        if(newP!=newp2){
                            alert(\'两次密码不对\');
                        }
                        else {
                            $.ajax({
                                '; ?>

                                url:'<?php echo $this->_tpl_vars['url']; ?>
userPass/modify',
                                <?php echo '
                                type:\'POST\', //GET
                                async:true,    //或false,是否异步
                                timeout:5000,    //超时时间
                                data:{\'pass\':newP},
                                dataType:\'text\',    //返回的数据格式：json/xml/html/script/jsonp/text
                                success:function(data){
                                    if(data==1100){
                                        layer.msg(\'修改成功\');
                                        setTimeout(function(){
                                            self.location.reload();//页面刷新
                                        },1000);
                                    }else {
                                        alert(data);
                                    }

                                },
                                error:function(xhr,textStatus){
                                    console.log(\'错误\')
                                }
                            });
                            layer.close();
                        }
                    }
                }

            })
        });
        $(\'#user\').click(function(){
            layer.open({
                type:2,
                area:[\'500px\',\'300px\'],
                title:\'修改\',
                shade:0.6,
                anim:2,
                '; ?>

                content: '<?php echo $this->_tpl_vars['url']; ?>
userPass/temp2',
                <?php echo '
                btn:[\'submit\'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var old = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("old").value;
                    var newP = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("new").value;
                    '; ?>

                    var rit = "<?php echo $this->_tpl_vars['u_login']['pass']; ?>
";
                    var url = "<?php echo $this->_tpl_vars['url']; ?>
userPass/md5/"+old;
                    //console.log(url);
                    <?php echo '
                    var ret = true;
                    $.get(url,function(smg){
                        //console.log(smg);
                        if(smg!=rit){
                            ret=false;
                            alert(1);
                        }
                    },\'text\');
                    //console.log(ret);
                    if(!ret){
                        alert(\'密码不对\');
                    }else {
                            $.ajax({
                                '; ?>

                                url:'<?php echo $this->_tpl_vars['url']; ?>
userPass/modify',
                                <?php echo '
                                type:\'POST\', //GET
                                async:true,    //或false,是否异步
                                timeout:5000,    //超时时间
                                data:{\'name\':newP},
                                dataType:\'text\',    //返回的数据格式：json/xml/html/script/jsonp/text
                                success:function(data){
                                    if(data==1100){
                                        layer.msg(\'修改成功\');
                                        setTimeout(function(){
                                            self.location.reload();//页面刷新
                                        },1000);
                                    }else {
                                        alert(data);
                                    }

                                },
                                error:function(xhr,textStatus){
                                    console.log(\'错误\')
                                }
                            });
                            layer.close();
                    }
                }

            })
        })
    })
    '; ?>

</script>
