<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 15:57
 */
header('content-type:text/html;charset=utf-8');
$id = $_GET['id'];
//删除数据
$link=mysqli_connect('localhost','root','root','work');
if(mysqli_connect_errno()){
    exit('数据库连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');

$result=mysqli_query($link,'delete from users where id='.$id);
if($result){
    if(mysqli_affected_rows($link)){
        echo "<script>alert('删除成功');window.location.href='../guanli.php'</script>";
    }else{
        echo "<script>alert('删除失败');window.location.href='../guanli.php?right'</script>";
    }
}else{
    echo "<script>alert('删除失败');window.location.href='../guanli.php?right'</script>";
}
mysqli_close($link);