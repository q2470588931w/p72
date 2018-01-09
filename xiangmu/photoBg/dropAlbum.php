<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/25
 * Time: 21:35
 */
header('content-type:text/html;charset=utf-8');
session_start();
$aname=$_GET['aname'];
//在数据库中查询数据并删除文件
$link=mysqli_connect('localhost','root','root','work');
if(mysqli_connect_errno()){
    exit('数据库连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');

$sql="select url from photo left join album on photo.aid=album.aid where aname='{$aname}'";
$result=mysqli_query($link,$sql);
/*var_dump($result);
exit;*/
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
/*var_dump($rows);*/
foreach($rows as $val){
    $ret=unlink(iconv('utf-8', 'gbk',$val['url']));
    if($ret){
        echo "<script>alert('文件删除一个');</script>";
    }else{
        echo "<script>alert('文件删除失败');</script>";
        exit;
    }
}
//删除目录
/*print_r($rows);
exit;*/
$ret=rmdir('../photoDatabase/'.iconv('utf-8','gbk',$_SESSION['name']).'/'.iconv('utf-8','gbk',$aname));
if($ret){
    echo "<script>alert('文件夹删除一个');</script>";
}else{
    echo "<script>alert('文件夹删除失败');</script>";
    exit;
}
//删除数据库数据

$sql="select aid from album where aname='{$aname}'";
$result=mysqli_query($link,$sql);
$aid=mysqli_fetch_assoc($result);
$sql="delete from photo where aid='{$aid['aid']}'";
$result=mysqli_query($link,$sql);
if($result){
    echo "<script>alert('数据2删除成功');</script>";
}else{
    echo "<script>alert('数据2删除失败');</script>";
    exit;
}
$sql="delete from album where aname='{$aname}'";
$result=mysqli_query($link,$sql);
if($result){
    echo "<script>alert('数据1删除成功');window.location.href='../photo.php?right=1'</script>";
}else{
    echo "<script>alert('数据1删除失败');</script>";
    exit;
}

mysqli_close($link);