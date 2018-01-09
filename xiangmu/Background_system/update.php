<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 18:01
 */
header('content-type:text/html;charset=utf-8');
$uid = (int)$_POST['uid'];
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
    // id
$sql = "update users set name='{$username}',age={$age},sex='{$sex}',phone='{$phone}',password='{$password}',email='{$email}',qxian='{$qxian}' where id={$uid}";
/*echo $sql;
exit;*/
$result = mysqli_query($link,$sql);
if($result){
    if(mysqli_affected_rows($link)){
        echo "<script>alert('修改成功');window.location.href='../guanli.php'</script>";
    }else{
        echo "<script>alert('修改失败');window.location.href='../guanli.php?right=2'</script>";
    }
}else{
    echo "<script>alert('修改失败');window.location.href='../guanli.php?right=2'</script>";
}
mysqli_close($link);