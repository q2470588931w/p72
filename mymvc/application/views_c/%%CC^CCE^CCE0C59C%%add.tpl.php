<?php /* Smarty version 2.6.31, created on 2017-12-26 10:25:26
         compiled from news/add.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['layUrl']; ?>
css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>新闻添加</legend>
</fieldset>

<form class="layui-form" action="<?php echo $this->_tpl_vars['url']; ?>
news/addNews" method="post" enctype="multipart/form-data">
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-inline">
            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">性质</label>
            <div class="layui-input-inline">
                <select name="naID" lay-filter="aihao">
                    <?php unset($this->_sections['sec1']);
$this->_sections['sec1']['name'] = 'sec1';
$this->_sections['sec1']['loop'] = is_array($_loop=$this->_tpl_vars['nathar']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <option value="<?php echo $this->_tpl_vars['nathar'][$this->_sections['sec1']['index']]['naID']; ?>
"><?php echo $this->_tpl_vars['nathar'][$this->_sections['sec1']['index']]['nathar']; ?>
</option>
                    <?php endfor; endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">作者</label>
        <div class="layui-input-inline">
            <input type="text" name="author" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">发布时间</label>
            <div class="layui-input-block">
                <input type="datetime-local" name="time" id="date1" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>

    <div style="margin-bottom: 5px;">

        <!-- 示例-970 -->
        <ins class="adsbygoogle" style="display:inline-block;width:970px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620"></ins>

    </div>
    <div class="layui-form-item layui-form-text">
      <label class="layui-form-label">编辑内容</label>
      <div class="layui-input-block">
          <script id="text" name="text" type="text/plain"></script>
      </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="submit" value="提交" class="layui-btn">
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script src="<?php echo $this->_tpl_vars['layUrl']; ?>
layui.js" charset="utf-8"></script>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
ueditor/ueditor.config.js" charset="utf-8"></script>
<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
ueditor/ueditor.all.js" charset="utf-8"></script>

<script>
    var ue = UE.getEditor('text');
    <?php echo '
    layui.use([\'form\', \'layedit\', \'laydate\'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;


        //创建一个编辑器
        var editIndex = layedit.build(\'LAY_demo_editor\');


    });
    '; ?>

</script>

</body>
</html>