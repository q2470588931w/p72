<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 14:46
 */
header('content-type:text/html;charset=utf-8');
$username = $_POST['username'];
$age = (int)$_POST['age'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$email = $_POST['email'];
$qxian = $_POST['qxian'];

if(empty($username) ||empty($age) ||empty($sex) ||empty($phone) ||empty($password) ||empty($email) ||empty($qxian) ){
    echo "<script>alert('请输入正确的格式')</script>";
}
//数据库操作
$link=mysqli_connect('localhost','root','root','work');
if(mysqli_connect_errno()){
    exit('数据库连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');
$result = mysqli_query($link,'select phone from users');
$ret = mysqli_fetch_all($result);
/*echo "<pre>";
print_r($ret);
exit;*/
foreach($ret as $val){
    if($val[0]==$phone){
        echo "<script>alert('用户已注册');window.location.href='../guanli.php?right=2'</script>";
    }
}
$sql = "insert into users values(null,'{$username}',{$age},'{$sex}','{$phone}','{$password}','{$email}','{$qxian}')";
/*echo $sql;
exit;*/
$result = mysqli_query($link,$sql);
if($result){
    if(mysqli_affected_rows($link)){
        echo "<script>alert('添加成功');window.location.href='../guanli.php'</script>";
    }else{
        echo "<script>alert('添加失败');window.location.href='../guanli.php?right=2'</script>";
    }
}else{
    echo "<script>alert('添加失败');window.location.href='../guanli.php?right=2'</script>";
}
mysqli_close($link);