<?php /* Smarty version 2.6.31, created on 2017-12-26 10:17:09
         compiled from Navigation/addNavigation.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css"  media="all">
<div style="margin-bottom: 5px;">

    <!-- 示例-970 --><input type="button" value="+" class="layui-btn">
    <ins class="adsbygoogle" style="display:inline-block;width:970px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620"></ins>

</div>
<div class="main">
    <div class="main_right">
        <form action="<?php echo $this->_tpl_vars['url']; ?>
Navigation/addNavigation" method="post">
            <div id="form-main">
            <div class="layui-form-item" id="all-form">
                <div class="layui-inline">
                    <label class="layui-form-label">栏目名</label>
                    <div class="layui-input-inline">
                        <input type="tel" name="pName[]" lay-verify="required|phone" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">栏目地址</label>
                    <div class="layui-input-inline">
                        <input type="text" name="pUrl[]" lay-verify="email" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            </div>
            <input type="submit" value="提交"  class="layui-btn">
        </form>
    </div>
</div>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.js"></script>
<script>
    <?php echo '
    $(document).ready(function () {

        $(\'input[value="+"]\').click(function () {
            //console.log(ul);
            var ul = $(\'#all-form\').clone();
            $(\'#form-main\').append(ul);
        })
    })
    '; ?>

</script>