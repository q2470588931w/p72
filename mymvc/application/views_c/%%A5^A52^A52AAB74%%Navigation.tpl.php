<?php /* Smarty version 2.6.31, created on 2017-12-26 10:19:12
         compiled from Navigation/Navigation.tpl */ ?>
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
        <th lay-data="{field:\'username\', width:80}">栏目ID</th>
        <th lay-data="{field:\'username\', width:80}">栏目名称</th>
        <th lay-data="{field:\'sex\', width:80, sort: true}">栏目等级</th>
        <th lay-data="{fixed: \'right\', width:178, align:\'center\', toolbar: \'#barDemo\'}">操作</th>
    </tr>
    '; ?>

    <?php $_from = $this->_tpl_vars['navigation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
        <tr>
            <?php echo '
                <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
            '; ?>

            <td><?php echo $this->_tpl_vars['key']+1; ?>
</td>
            <td><?php echo $this->_tpl_vars['val']['ID']; ?>
</td>
            <td><?php echo $this->_tpl_vars['val']['pName']; ?>
</td>
            <td>第<?php echo $this->_tpl_vars['val']['fID']; ?>
级</td>
            <td>
                <a href="#" name="change" class="layui-btn layui-btn-xs">
                    修改
                </a><input type='hidden' value="<?php echo $this->_tpl_vars['val']['ID']; ?>
">
                <a href="<?php echo $this->_tpl_vars['url']; ?>
navigation/dropNavigation/<?php echo $this->_tpl_vars['val']['ID']; ?>
" onclick="return config('确定删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                    删除
                </a>

                <a href="#" name="append" class="layui-btn layui-btn-xs">
                    添加子栏目
                </a><input type='hidden' value="<?php echo $this->_tpl_vars['val']['ID']; ?>
">
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
        $(\'a[name="append"]\').click(function(){
            var pid  = $(this).next().val();
            layer.open({
                type:2,
                area:[\'500px\',\'300px\'],
                title:\'添加子分类\',
                shade:0.6,
                anim:2,
                '; ?>

                content: '<?php echo $this->_tpl_vars['url']; ?>
navigation/temp1',
                <?php echo '
                btn:[\'submit\'],
                cancel:function(){
                    //右上角关闭回调
                },
                yes:function(index){
                    var name = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("name").value;

                    var url  = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("url").value;
                    $.ajax({
                        '; ?>

                        url:'<?php echo $this->_tpl_vars['url']; ?>
navigation/addChild',
                        <?php echo '
                        type:\'POST\', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        data:{\'name\':name,\'url\':url,\'pid\':pid},
                        dataType:\'text\',    //返回的数据格式：json/xml/html/script/jsonp/text
                        success:function(data){
                            if(data==1100){
                                layer.msg(\'添加成功\');
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
        });
        $(\'a[name="change"]\').click(function(){
            var pid  = $(this).next().val();
            layer.open({
                type:2,
                area:[\'500px\',\'300px\'],
                title:\'更改\',
                shade:0.6,
                anim:2,
                '; ?>

                content: '<?php echo $this->_tpl_vars['url']; ?>
navigation/temp2',
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
navigation/changeurl',
                        <?php echo '
                        type:\'POST\', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        data:{\'url\':name,\'pid\':pid},
                        dataType:\'text\',    //返回的数据格式：json/xml/html/script/jsonp/text
                        success:function(data){
                            if(data==1100){
                                layer.msg(\'添加成功\');
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