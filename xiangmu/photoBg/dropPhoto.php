<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/25
 * Time: 20:58
 */
session_start();
header('content-type:text/html;charset=utf-8');
$pname=$_GET['pname'];
//删除数据库数据
$link=mysqli_connect('localhost','root','root','work');
if(mysqli_connect_errno()){
    exit('数据库连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');
$sql="select url from photo where pname='{$pname}'";
$result=mysqli_query($link,$sql);

$row = mysqli_fetch_assoc($result)['url'];
$res=unlink(iconv('utf-8', 'gbk',$row));
if($res){
    echo "<script>alert('数据文件删除成功');</script>";
}
$sql="delete from photo where pname='{$pname}'";
$result=mysqli_query($link,$sql);
if($result){
    echo "<script>alert('数据删除成功');window.location.href='../photo.php?right=2&aname=".$_SESSION['aname']."'</script>";
}
mysqli_close($link);
