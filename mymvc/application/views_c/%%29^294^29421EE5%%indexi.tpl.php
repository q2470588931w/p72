<?php /* Smarty version 2.6.31, created on 2017-12-26 10:17:05
         compiled from index/indexi.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css">
<div class="layui-body" name="right">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <?php unset($this->_sections['sec1']);
$this->_sections['sec1']['name'] = 'sec1';
$this->_sections['sec1']['loop'] = is_array($_loop=$this->_tpl_vars['admin']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sec1']['show'] = true;
$this->_sections['sec1']['max'] = $this->_sections['sec1']['loop'];
$this->_sections['sec1']['step'] = 1;
$this->_sections['sec1']['start'] = $this->_sections['sec1']['step'] > 0 ? 0 : $this->_sections['sec1']['loop']-1;
if ($this->_sections['sec1']['show']) {
    $this->_sections['sec1']['total'] = $this->_sections['sec1']['loop'];
    if ($this->_sections['sec1']['total'] == 0)
        $this->_sections['sec1']['show'] = false;
} else
    $this->_sections['sec1']['total'] = 0;
if ($this->_sections['sec1']['show']):

            for ($this->_sections['sec1']['index'] = $this->_sections['sec1']['start'], $this->_sections['sec1']['iteration'] = 1;
                 $this->_sections['sec1']['iteration'] <= $this->_sections['sec1']['total'];
                 $this->_sections['sec1']['index'] += $this->_sections['sec1']['step'], $this->_sections['sec1']['iteration']++):
$this->_sections['sec1']['rownum'] = $this->_sections['sec1']['iteration'];
$this->_sections['sec1']['index_prev'] = $this->_sections['sec1']['index'] - $this->_sections['sec1']['step'];
$this->_sections['sec1']['index_next'] = $this->_sections['sec1']['index'] + $this->_sections['sec1']['step'];
$this->_sections['sec1']['first']      = ($this->_sections['sec1']['iteration'] == 1);
$this->_sections['sec1']['last']       = ($this->_sections['sec1']['iteration'] == $this->_sections['sec1']['total']);
?>
                欢迎您：<?php echo $this->_tpl_vars['admin'][$this->_sections['sec1']['index']]['gName']; ?>

                <br>
                您使用的账号: <?php echo $this->_tpl_vars['admin'][$this->_sections['sec1']['index']]['user']; ?>

                您的权限是：<?php echo $this->_tpl_vars['admin'][$this->_sections['sec1']['index']]['gName']; ?>

                <br>
                您的上次登录时间是: <?php echo $this->_tpl_vars['loginTime']; ?>

                <br>
                您的上次登录IP地址是: <?php echo $this->_tpl_vars['loginIP']; ?>

                <br>
                不是本人登录的？
                <a href="<?php echo $this->_tpl_vars['url']; ?>
userPass/my" class="layui-btn layui-btn-xs">点这里</a>
            <?php endfor; endif; ?>
        </div>
</div>