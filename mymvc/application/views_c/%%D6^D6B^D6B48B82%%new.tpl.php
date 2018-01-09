<?php /* Smarty version 2.6.31, created on 2017-12-26 10:19:38
         compiled from news/new.tpl */ ?>
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
        <th lay-data="{field:\'username\', width:80}">标题</th>
        <th lay-data="{field:\'sex\', width:80, sort: true}">作者</th>
        <th lay-data="{field:\'city\', width:80}">发布时间</th>
        <th lay-data="{field:\'sign\', width:160}">性质</th>
        <th lay-data="{fixed: \'right\', width:178, align:\'center\', toolbar: \'#barDemo\'}">操作</th>
    </tr>
    '; ?>

    <?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
    <tr>
        <?php echo '
        <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
        '; ?>

        <td><?php echo $this->_tpl_vars['key']+1; ?>
</td>
        <td><?php echo $this->_tpl_vars['val']['nTitle']; ?>
</td>
        <td><?php echo $this->_tpl_vars['val']['author']; ?>
</td>
        <td><?php echo $this->_tpl_vars['val']['nTime']; ?>
</td>
        <td><?php echo $this->_tpl_vars['val']['nathar']; ?>
</td>
        <td>
            <a href="<?php echo $this->_tpl_vars['url']; ?>
/news/recycleBin/<?php echo $this->_tpl_vars['val']['nID']; ?>
" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                删除
            </a>
        </td>

    </tr>
    <?php endforeach; endif; unset($_from); ?>
    </thead>
</table>

<script src="<?php echo $this->_tpl_vars['layUrl']; ?>
layui.js" charset="utf-8"></script>

</body>
</html>