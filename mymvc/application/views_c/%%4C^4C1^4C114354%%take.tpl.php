<?php /* Smarty version 2.6.31, created on 2017-12-26 10:23:14
         compiled from Auth/take.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['cssUrl']; ?>
Auth/take.css">
    <div class="main">
        <table>
            <tr>
                <th>有</th>
                <td>
                    <select multiple="multiple" class="let" id="have">
                        <?php $_from = $this->_tpl_vars['had']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                            <option value="<?php echo $this->_tpl_vars['val']; ?>
"><?php echo $this->_tpl_vars['val']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
                <td>
                    <div class="cer">
                        <button>——></button>
                        <button>====></button>
                        <button><——</button>
                        <button><====</button>
                    </div>
                </td>
                <td>
                    <select multiple="multiple" class="rit">
                        <?php $_from = $this->_tpl_vars['not']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                            <option value="<?php echo $this->_tpl_vars['val']; ?>
"><?php echo $this->_tpl_vars['val']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
                <th>无</th>
            </tr>
        </table>
    </div>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.js"></script>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
Auth/take.js"></script>