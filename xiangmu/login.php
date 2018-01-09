
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        *{
            margin:0px auto;
        }
        .main{
            width: 100%;
            height: 850px;
            background-image: url("./images/timg_image.png");
        }
        #yzma{
            display: none;
        }
        ul{
            padding: 5px;
            height:260px;
            width: 300px;
            font-size: 18px;
            position: fixed ;
            background-color: rgba(255, 255, 255, 0.33);
            left: 20%;
            top: 40%;
        }
        li{
            list-style-type: none;
            height: 25px;
            margin-left: 10px;
        }
        img{
            position:absolute;
            right: 0;
        }
    </style>
</head>
<body>
<div class="main">
    <form id="fom">
        <ul>
            <li><input type="hidden" value="0" name="num"/></li>
            <li>账&nbsp;&nbsp;&nbsp;号：<input type="text" name="username" placeholder="请输入手机号码"/></li>
            <li id="username"></li>
            <li>密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd" placeholder="请输入密码"/></li>
            <li id="password"></li>
            <li>密码保存：<input type="radio" value="7" name="day"/>7天
                <input type="radio" value="10" name="day"/>10天 </li>
            <li></li>
            <li><div id="yzma">验证码：<input type="text" name="yanz" /><img src="images/tupian.php" onclick="this.src='./images/tupian.php?'+Math.random();" style="width: 90px;height: 50px;"/>
                </div></li>
            <li id="yanz"></li>
            <li>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="button" value="登录" onclick="chan()"/>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="reset" /></li>
        </ul>

    </form>
</div>



<script>
    /*window.onload=function(){
        var xml=new XMLHttpRequest();
        xml.open('get','./Background_system/jianyan.php',true);
        xml.send(null);
        xml.onload=function(){
            if(xml.status==200){
                var fan=xml.responseText;
                if(fan==1){
                    window.location.href='./guanli.php';
                }else {
                    alert('请先登录');
                }
            }
        }
    };*/

    function chan() {
        var num = document.getElementsByName('num')[0].value;
        /*console.log(num);*/
        var fom = document.getElementById('fom');
        var foms = new FormData(fom);
        var xmhttp = new XMLHttpRequest();
        xmhttp.open('post','./Background_system/login.php',true);
        xmhttp.send(foms);
        xmhttp.onload = function(){
            if(xmhttp.status == 200 ){
                var ret=xmhttp.responseText;
                if(ret==2){
                    alert('登录成功');
                    window.location.href='./guanli.php';
                }else {
                    var n= ++num;
                    if(n==3){
                        document.getElementById('yzma').style.display='block';
                    }
                    document.getElementsByName('num')[0].value = n;
                    alert('账号或密码错误');

                }
            }
        }
    }
</script>
</body>
</html>
