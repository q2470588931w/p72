<?php /* Smarty version 2.6.31, created on 2017-12-26 10:23:34
         compiled from user/men.tpl */ ?>
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

    <!-- 示例-970 -->
    <ins class="adsbygoogle" style="display:inline-block;width:970px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620"></ins>

</div>

<?php echo '

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
        <th lay-data="{field:\'id\', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:\'username\', width:80}">用户名</th>
        <th lay-data="{field:\'sex\', width:80, sort: true}">权限</th>
        <th lay-data="{fixed: \'right\', width:178, align:\'center\', toolbar: \'#barDemo\'}">操作</th>
    </tr>
    '; ?>

    <?php $_from = $this->_tpl_vars['men']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
                <td><?php echo $this->_tpl_vars['val']['user']; ?>
</td>
                <td>

                    <?php if ($this->_tpl_vars['val']['gName'] == '超级管理员'): ?>
                        <?php echo $this->_tpl_vars['val']['gName']; ?>

                    <?php else: ?>
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['val']['id']; ?>
">
                        <select name="grade">
                            <?php $_from = $this->_tpl_vars['grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gal']):
?>
                                <?php if ($this->_tpl_vars['gal']['gName'] != '超级管理员'): ?>
                                    <?php if ($this->_tpl_vars['val']['gName'] == $this->_tpl_vars['gal']['gName']): ?>
                                        <option value="<?php echo $this->_tpl_vars['gal']['gID']; ?>
" selected="selected"><?php echo $this->_tpl_vars['gal']['gName']; ?>
</option>
                                    <?php else: ?>
                                        <option value="<?php echo $this->_tpl_vars['gal']['gID']; ?>
"><?php echo $this->_tpl_vars['gal']['gName']; ?>
</option>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    <?php endif; ?>
                </td>
                <?php if ($this->_tpl_vars['val']['user'] != $this->_tpl_vars['my']['user']): ?>
                    <td>

                        <input type="submit" value="修改" class="layui-btn layui-btn-xs">

                        <a href="<?php echo $this->_tpl_vars['url']; ?>
user/dropMen/<?php echo $this->_tpl_vars['val']['id']; ?>
" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                            删除
                        </a>

                    </td>
                <?php else: ?>
                    <td>本人账号</td>
                <?php endif; ?>
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
        $(\'#add\').click(function(){
            layer.open({
                type:2,
                area:[\'500px\',\'300px\'],
                title:\'修改\',
                shade:0.6,
                anim:2,
                '; ?>

                content: '<?php echo $this->_tpl_vars['url']; ?>
user/temp2',
                <?php echo '
                btn:[\'submit\'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var name = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("name").value;
                    var newP = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("pass").value;
                    var newp2 = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("pass2").value;
                    var grade = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("grade").value;
                    if(newP!=newp2){
                        alert(\'两次密码不对\');
                    }
                    else {
                        $.ajax({
                            '; ?>

                            url:'<?php echo $this->_tpl_vars['url']; ?>
user/takeuser',
                            <?php echo '
                            type:\'POST\', //GET
                            async:true,    //或false,是否异步
                            timeout:5000,    //超时时间
                            data:{\'pass\':newP,\'name\':name,\'grade\':grade},
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
                }

            })
        });
    })
    '; ?>

</script>
</body>
</html>