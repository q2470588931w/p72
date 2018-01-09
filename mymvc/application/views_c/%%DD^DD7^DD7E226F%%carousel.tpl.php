<?php /* Smarty version 2.6.31, created on 2017-12-26 10:25:38
         compiled from news/carousel.tpl */ ?>
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
news/Carousel" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <input type="button" value="多张" class="layui-form-label">
            <div class="layui-input-inline" id="jiaru">
                <input type="file" name="Carousel[]">
            </div>
        </div>
        <input type="submit" value="添加" class="layui-btn">
    </form>
</div>

<?php echo '

<table class="layui-table" >
    <thead>
    <tr>
        <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
        <th lay-data="{field:\'id\', width:80, sort: true, fixed: true}">序号</th>
        <th lay-data="{field:\'username\', width:80}">顺序</th>
        <th lay-data="{field:\'sign\', width:160}">图片</th>
        <th lay-data="{fixed: \'right\', width:178, align:\'center\', toolbar: \'#barDemo\'}">操作</th>
    </tr>
    '; ?>

    <?php $_from = $this->_tpl_vars['Carousel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
        <tr>
            <form action="<?php echo $this->_tpl_vars['url']; ?>
news/changeCarousel" method="post">
                <?php echo '
                    <th lay-data="{type:\'checkbox\', fixed: \'left\'}"></th>
                '; ?>

                <td><?php echo $this->_tpl_vars['key']+1; ?>
</td>
                <td><input type="number" value="<?php echo $this->_tpl_vars['val']['corder']; ?>
" min="0" name="order"></td>
                <td><img src="<?php echo $this->_tpl_vars['url']; ?>
static/news/Carousel/<?php echo $this->_tpl_vars['val']['cUrl']; ?>
" alt="图片不见啦"></td>
                <input type="hidden" value="<?php echo $this->_tpl_vars['val']['cID']; ?>
" name="cID">

                <td>
                    <input type="submit" value="修改" class="layui-btn layui-btn-xs">
                    <a href="<?php echo $this->_tpl_vars['url']; ?>
news/dropCarousel/<?php echo $this->_tpl_vars['val']['cID']; ?>
" onclick="return config('确认删除')" class="layui-btn layui-btn-danger layui-btn-xs">
                        删除
                    </a>
                </td>
            </form>
        </tr>
    <?php endforeach; endif; unset($_from); ?>
    </thead>
</table>

<script src="<?php echo $this->_tpl_vars['layUrl']; ?>
layui.js" charset="utf-8"></script>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.js"></script>
<script>
    <?php echo '
    $(document).ready(function () {
        $(\'input[value="多张"]\').click(function () {
            $(\'#jiaru\').append(\'<input type="file" name="Carousel[]">\');
        })
    })
    '; ?>

</script>
</body>
</html>