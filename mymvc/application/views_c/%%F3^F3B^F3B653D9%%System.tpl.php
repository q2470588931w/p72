<?php /* Smarty version 2.6.31, created on 2017-12-26 10:19:40
         compiled from System/System.tpl */ ?>
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
    <a href="#" id="add" class="layui-btn">添加新网站信息</a>
    <!-- 示例-970 -->
    <ins class="adsbygoogle" style="display:inline-block;width:970px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620"></ins>

</div>

<?php echo '

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
        <th lay-data="{field:\'id\', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:\'username\', width:80}">NAME</th>
        <th lay-data="{field:\'sex\', width:80, sort: true}">VALUE</th>
        <th lay-data="{fixed: \'right\', width:178, align:\'center\', toolbar: \'#barDemo\'}">操作</th>
    </tr>
    '; ?>

    <?php $_from = $this->_tpl_vars['Systembar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['bar']):
?>
        <tr>
            <?php echo '
                <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
            '; ?>

            <form action="<?php echo $this->_tpl_vars['url']; ?>
system/changeSystem" method="post">
                <input type="hidden" name="sbID" value="<?php echo $this->_tpl_vars['bar']['sbID']; ?>
">
                <th><?php echo $this->_tpl_vars['key']+1; ?>
</th>
                <th><?php echo $this->_tpl_vars['bar']['sbName']; ?>
</th>
                <td>
                    <?php if ($this->_tpl_vars['System'] == array ( )): ?>
                        没有任何数据!
                    <?php else: ?>
                        <?php $_from = $this->_tpl_vars['System']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                            <?php if ($this->_tpl_vars['val']['sbID'] == $this->_tpl_vars['bar']['sbID']): ?>
                                <?php echo $this->_tpl_vars['val']['sVal']; ?>

                            <?php else: ?>

                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    <?php endif; ?>
                </td>
                <td>
                    <input type="text" name="System" value="">
                    <input type="submit" value="修改" class="layui-btn layui-btn-xs">
                    <?php if ($this->_tpl_vars['key'] > 7): ?>
                    <a href="<?php echo $this->_tpl_vars['url']; ?>
system/dropAll/<?php echo $this->_tpl_vars['val']['sbID']; ?>
" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                        删除
                    </a>
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
        $(\'#add\').click(function(){
            layer.open({
                type:2,
                area:[\'500px\',\'300px\'],
                title:\'添加\',
                shade:0.6,
                anim:2,
                '; ?>

                content: '<?php echo $this->_tpl_vars['url']; ?>
system/temp1',
                <?php echo '
                btn:[\'submit\'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var name = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("name").value;
                    var newP = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("pass").value;
                    $.ajax({
                        '; ?>

                        url:'<?php echo $this->_tpl_vars['url']; ?>
system/system',
                        <?php echo '
                        type:\'POST\', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        data:{\'pass\':newP,\'name\':name},
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
    })
    '; ?>

</script>
</body>
</html>