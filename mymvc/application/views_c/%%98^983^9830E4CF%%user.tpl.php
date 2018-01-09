<?php /* Smarty version 2.6.31, created on 2017-12-26 10:23:03
         compiled from Auth/user.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<div style="margin-bottom: 5px;">
    <ins class="adsbygoogle" style="display:inline-block;width:970px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620"></ins>

</div>

<?php echo '

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
        <th lay-data="{field:\'id\', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:\'username\', width:80}">名称</th>
        <th lay-data="{field:\'username\', width:80}">权限</th>
        <th lay-data="{fixed: \'right\', width:178, align:\'center\', toolbar: \'#barDemo\'}">操作</th>
    </tr>
    '; ?>

    <?php $_from = $this->_tpl_vars['grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
        <tr>
            <?php echo '
                <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
            '; ?>

            <form action="<?php echo $this->_tpl_vars['url']; ?>
auth/change" method="post">
                <td><?php echo $this->_tpl_vars['key']+1; ?>
</td>
                <td><?php echo $this->_tpl_vars['val']['gName']; ?>
</td>
                <td>
                    <?php $_from = $this->_tpl_vars['allow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['all']):
?>
                        <?php if ($this->_tpl_vars['all']['gID'] == $this->_tpl_vars['val']['gID']): ?>
                            <?php echo $this->_tpl_vars['all']['name']; ?>

                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </td>
                <td>
                    <?php if ($this->_tpl_vars['val']['gName'] != '超级管理员'): ?>
                        <a href="#" name="take" class="layui-btn layui-btn-xs">
                            分配
                        </a><input type="hidden" value="<?php echo $this->_tpl_vars['val']['gID']; ?>
">
                    <?php else: ?>
                        不可更改
                    <?php endif; ?>

                </td>
            </form>
        </tr>
    <?php endforeach; endif; unset($_from); ?>
    </thead>
</table>

<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.js"></script>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
layer/layer.js"></script>
<script>
    <?php echo '
    $(document).ready(function(){
        $(\'a[name="take"]\').click(function(){
            var gID = $(this).next().val();
            //console.log(gName);
            layer.open({
                type:2,
                area:[\'500px\',\'300px\'],
                title:\'分配\',
                shade:0.6,
                anim:2,
                '; ?>

                content: '<?php echo $this->_tpl_vars['url']; ?>
auth/take/'+gID,
                <?php echo '
                btn:[\'submit\'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var arr = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("have").childNodes;
                    //console.log(name);
                    name=JSON.stringify(takes(arr));
                    console.log(name);
                    $.ajax({
                        '; ?>

                        url:'<?php echo $this->_tpl_vars['url']; ?>
auth/changeAuth',
                        <?php echo '
                        type:\'POST\', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        data:{\'name\':name,\'gID\':gID},
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
                        error:function(){
                            console.log(\'错误\')
                        }
                    });
                    layer.close();

                }

            })
        });
        function takes(arr){
            var arrs = new Array();
            for(var i=0;i<arr.length;i++){
                if(arr[i].nodeName == \'OPTION\'){
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
    '; ?>

</script>
</body>
</html>