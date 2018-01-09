<?php /* Smarty version 2.6.31, created on 2017-12-26 16:33:32
         compiled from Reception/top/top.tpl */ ?>

<link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css"  media="all">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">
                <img src="<?php echo $this->_tpl_vars['url']; ?>
static/Navigation/<?php echo $this->_tpl_vars['logo']['url']; ?>
" alt="暂无logo" style="width: 140px;height: 50px">
            </div>
            <ul class="layui-nav layui-layout-left">
                <?php $_from = $this->_tpl_vars['navigation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                    <?php if ($this->_tpl_vars['val']['fID'] == 1): ?>
                    <li class="layui-nav-item">
                        <a href="<?php echo $this->_tpl_vars['val']['pUrl']; ?>
" target="body">
                            <?php echo $this->_tpl_vars['val']['pName']; ?>

                        </a>
                    </li>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
    </div>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.js"></script>