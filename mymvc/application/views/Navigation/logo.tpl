<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>logo管理</legend>
</fieldset>
<form action="{$url}Navigation/logo" method="post" enctype="multipart/form-data">
<div class="layui-upload">
    <button type="button" class="layui-btn" id="test1"><input type="file" name="logo"></button>
    <div class="layui-upload-list">
        <img class="layui-upload-img" id="demo1" src="{$url}static/Navigation/{$logo[0].url}" alt="logo图片">
        <p id="demoText"></p>
    </div>
    <input type="submit" value="更改"  class="layui-btn">
</div>
</form>

<script src="{$layUrl}layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script src="{$jsUrl}jquery.js"></script>
<script>
    {literal}
    $(document).ready(function () {
        $('[name="logo"]').change(function () {
            //console.log(this.files);
            var fil = this.files[0];
            liulan(fil);
        })
        function liulan(fil) {
            //console.log($(this).val());
            //$('img[alt="我的头像"]').attr('src',$(this).val());
            if(typeof (fil) != 'undefined'){    //预判是否有该信息
                var reads = new FileReader();   //文件读取对象
                reads.readAsDataURL(fil);
                reads.onload = function (event) {
                    var listType = ['jpeg','png','gif'];
                    //console.log(event.target.result);
                    if(listType.indexOf(fil.type.split('/')[1]) != -1){
                        $('img[alt="logo图片"]').attr('src',event.target.result);
                        $('button').attr('disabled',false);
                    }else {
                        alert('文件不符合');
                    }
                }
            }else {
                $('img[alt="logo图片"]').attr('src','');
                $('button').attr('disabled',true);
            }
            //console.log($(this).val());
        }
    })
    {/literal}
</script>

</body>
</html>