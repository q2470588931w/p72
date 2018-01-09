<?php /* Smarty version 2.6.31, created on 2017-12-26 16:33:32
         compiled from Reception/foot/foot.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css"  media="all">


        <div class="layui-footer" style="background-color:white">
            <p style="height: 29px">
                <?php $_from = $this->_tpl_vars['friendship']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                    &ensp;&ensp;<a href="<?php echo $this->_tpl_vars['val']['url']; ?>
" class="layui-btn layui-btn-sm layui-btn-normal"><?php echo $this->_tpl_vars['val']['name']; ?>
</a>&ensp;&ensp;
                <?php endforeach; endif; unset($_from); ?>
                &ensp;&ensp;<?php echo $this->_tpl_vars['statement']; ?>
&ensp;&ensp;<?php echo $this->_tpl_vars['Notice']; ?>
&ensp;&ensp;<?php echo $this->_tpl_vars['Company_address']; ?>
&ensp;&ensp;<?php echo $this->_tpl_vars['Record_number']; ?>
&ensp;&ensp;<?php echo $this->_tpl_vars['Internet_ICP_record']; ?>

            </p>
        </div>