<?php /* Smarty version 2.6.31, created on 2017-12-26 10:19:45
         compiled from role/role.tpl */ ?>
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
        <th lay-data="{field:\'username\', width:80}">角色名</th>
        <th lay-data="{field:\'sex\', width:80, sort: true}">作者</th>
        <th lay-data="{field:\'city\', width:80}">阵营</th>
        <th lay-data="{field:\'city\', width:80}">舰船级别</th>
        <th lay-data="{field:\'city\', width:80}">舰船型号</th>
        <th lay-data="{field:\'city\', width:80}">英文名</th>
        <th lay-data="{fixed: \'right\', width:178, align:\'center\', toolbar: \'#barDemo\'}">操作</th>
    </tr>
    '; ?>

    <?php $_from = $this->_tpl_vars['role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
        <tr>
            <form action="<?php echo $this->_tpl_vars['url']; ?>
role/addRole" method="post">
            <?php echo '
                <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
            '; ?>

            <td><?php echo $this->_tpl_vars['key']; ?>
</td>
                <input type="hidden" name="mID" value="<?php echo $this->_tpl_vars['val']['mID']; ?>
">
            <td><input type="text" value="<?php echo $this->_tpl_vars['val']['mName']; ?>
" name="mName"></td>
            <td><input type="text" value="<?php echo $this->_tpl_vars['val']['author']; ?>
" name="author"></td>
            <td><?php echo $this->_tpl_vars['val']['cName']; ?>
</td>
            <td><input type="text" value="<?php echo $this->_tpl_vars['val']['levalName']; ?>
" name="levalName"></td>
            <td><input type="text" value="<?php echo $this->_tpl_vars['val']['modelName']; ?>
" name="modelName"></td>
            <td><input type="text" value="<?php echo $this->_tpl_vars['val']['mEnglishName']; ?>
" name="mEnglishName"></td>
            <td>
                <input type="submit" value="修改" class="layui-btn layui-btn-xs">
            </td>
            </form>
        </tr>
    <?php endforeach; endif; unset($_from); ?>
    </thead>
</table>

<script src="<?php echo $this->_tpl_vars['layUrl']; ?>
layui.js" charset="utf-8"></script>

</body>
</html>