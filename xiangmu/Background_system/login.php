<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/21
 * Time: 15:29
 */
session_start();
header('content-type:text/html;charset=utf-8');

$num = $_POST['num'];
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$yanz = $_POST['yanz'];
$day = (int)@$_POST['day'];
/*var_dump($day);
exit;*/
/*echo $username.'——'.$pwd.'——'.$yanz.'——'.$day[0];
exit;*/


if(empty($username) && empty($pwd)){
    echo "<script>alert('请输入正确的格式');window.location.href='../login.php'</script>";
    exit;
}
//提取数据库的数据
$link=mysqli_connect('localhost','root','root','work');
if(mysqli_connect_errno()){
    exit('数据库连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');
$result = mysqli_query($link,'select id,phone,password,name from users');
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
/*var_dump($rows);*/
mysqli_close($link);
if($num<3){
    foreach ($rows as $val){
        if($username == $val['phone'] && $pwd == $val['password']){
           /* if($day){
                setcookie('user','小谢',time()+$day*60*60*24);
            }*/
            $_SESSION['user']=$username;
            $_SESSION['name'] = $val['name'];
            $_SESSION['id'] = $val['id'];
            echo 2;
            exit;
        }
    }
    echo 1;
}elseif($num>=3 && $num<=10){
    if($yanz == $_SESSION['code']){
        foreach ($rows as $val){
            if($username==$val['phone'] && $pwd == $val['password']){
               /* if($day){
                    setcookie('user','小谢',time()+$day*60*60*24);
                }*/
                $_SESSION['user']=$username;
                $_SESSION['name'] = $val['name'];
                $_SESSION['id'] = $val['id'];
                echo 2;
                exit;
            }
        }echo 1;
    }else{
        echo "<script>alert('验证码错误');window.location.href='../login.php'</script>";
        exit;
    }
}else{
    echo "<script>alert('你已经错误太多，请回去想想');window.location.href='../login.php'</script>";
    exit;
}
