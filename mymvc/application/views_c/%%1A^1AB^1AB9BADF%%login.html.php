<?php /* Smarty version 2.6.31, created on 2017-12-26 16:33:58
         compiled from login.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
    <script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.js"></script>
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['cssUrl']; ?>
main.css">
</head>
<body>
<div style="text-align: center"><img src="<?php echo $this->_tpl_vars['imgUrl']; ?>
logo.png" alt="欢迎"></div>
    <div class="main">

        <div class="main_left">
            <ul>
                <li></li>
                <li>用户名：</li>
                <li></li>
                <li>密码：</li>
                <li></li>

            </ul>
        </div>
        <div class="main_right">
            <form>
                <ul>
                    <li></li>
                    <li><input type="text" name="user" value="请输入你的用户名" maxlength="20"></li>
                    <li></li>
                    <li><input type="text" name="pwd" value="请输入您的密码" maxlength="20"></li>
                    <li></li>
                    <li><button type="button">登录</button></li>
                </ul>
            </form>
        </div>
    </div>
    <script>
        <?php echo '
        $(document).ready(function(){
            $(\'button\').attr(\'disabled\',true);
            var users = $(\'[name="user"]\');
            var usee = $(\'.main_right li:eq(2)\');
            users.bind({
                focusin:function () {
                    users.removeAttr("value");
                    usee.html("<font color=\'green\'>请输入以字母开头和结尾5-20个字符</font>");
                },
                focusout:function () {
                    if(users.prop("value")==""){
                        users.attr("value","请输入你的用户名");
                        usee.html("");
                    }else {
                            usee.html("<font color=\'green\'>√</font>");
                        disa();
                    }
                },
                change:function () {
                    disa();
                    if(users.prop("value")==""){
                        users.attr("value","请输入你的用户名");
                        usee.html("");
                    }
                }
            });
            var pwd = $(\'[name="pwd"]\');
            var pws = $(\'.main_right li:eq(4)\');
            pwd.bind({
                focusin:function () {
                    pwd.removeAttr(\'value\');
                    pwd.attr({type:"password"});
                    pws.html("<font color=\'green\'>请输入5-20位数字/字母组合</font>");
                },
                change:function () {
                    disa();
                },
                focusout:function () {
                    if(pwd.prop("value")==""){
                        pwd.attr({value:"请输入您的密码",type:"text"});
                        pws.html("");
                    }else {
                        pws.html("<font color=\'green\'>格式正确</font>");
                    }
                    disa();
                }
            });
            function disa() {
                if(usee.text()==\'√\' && pws.text() ==\'格式正确\'){
                    $(\'button\').removeAttr(\'disabled\');
                    //alert(11);
                }else {
                    $(\'button\').attr(\'disabled\',true);
                    //alert(1);
                }
            }
            $(\'button\').bind(\'click\',function(){
                login();
            });
            function login(){
                var fom = $(\'form\').serialize();
                $.ajax({
                '; ?>

                    url:'<?php echo $this->_tpl_vars['url']; ?>
adminLogin/loginIN',
                    <?php echo '
                    type:\'post\',
                    async:true,
                    data: fom,
                    dataType:\'text\',
                    timeout:5000,
                    success:function(smg){
                        console.log(smg);

                        if(smg==2){

                            alert(\'欢迎登陆\');
                            '; ?>

                            window.location.href='<?php echo $this->_tpl_vars['url']; ?>
admin/index';
                            <?php echo '
                        }else{
                            alert(\'账号密码错误\')
                        }
                    },
                    error:function(){
                        alert(\'哎呀，服务器出错啦\');
                    }
                })
            }
        })
        '; ?>

    </script>
</body>
</html>