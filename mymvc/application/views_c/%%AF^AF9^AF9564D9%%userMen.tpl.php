<?php /* Smarty version 2.6.31, created on 2017-12-26 10:19:45
         compiled from user/userMen.tpl */ ?>
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

    <form action="<?php echo $this->_tpl_vars['url']; ?>
user/adduser" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">添加一个</label>
            <div class="layui-input-inline">
                <input type="text" name="pName[]" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                <input type="submit" value="添加" class="layui-btn">
            </div>
        </div>
    </form>
</div>

<?php echo '

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
        <th lay-data="{field:\'id\', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:\'username\', width:80}">职位</th>
        <th lay-data="{fixed: \'right\', width:178, align:\'center\', toolbar: \'#barDemo\'}">操作</th>
    </tr>
    '; ?>

    <?php $_from = $this->_tpl_vars['user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
        <tr>
            <?php echo '
                <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
            '; ?>

            <td><?php echo $this->_tpl_vars['key']+1; ?>
</td>
            <td><?php echo $this->_tpl_vars['val']['gName']; ?>
</td>
            <td>
                <?php if ($this->_tpl_vars['val']['gName'] != '超级管理员'): ?>
                    <a href="#" name="modify" class="layui-btn layui-btn-xs">
                        修改
                    </a><input type="hidden" value="<?php echo $this->_tpl_vars['val']['gID']; ?>
">

                    <a href="<?php echo $this->_tpl_vars['url']; ?>
user/drop/<?php echo $this->_tpl_vars['val']['gID']; ?>
" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                        删除
                    </a>
                <?php else: ?>
                    最高权限
                <?php endif; ?>
            </td>
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
        $(\'a[name="modify"]\').click(function(){
            var pid  = $(this).next().val();
            layer.open({
                type:2,
                area:[\'500px\',\'300px\'],
                title:\'修改\',
                shade:0.6,
                anim:2,
                '; ?>

                content: '<?php echo $this->_tpl_vars['url']; ?>
user/temp1',
                <?php echo '
                btn:[\'submit\'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var name = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("name").value;
                    $.ajax({
                        '; ?>

                        url:'<?php echo $this->_tpl_vars['url']; ?>
user/modify',
                        <?php echo '
                        type:\'POST\', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        data:{\'pName\':name,\'pid\':pid},
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
            })
        })
    })
    '; ?>

</script>
</body>
</html>