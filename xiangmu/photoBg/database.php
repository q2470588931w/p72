<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 23:07
 */
//�����ļ���
header('content-type:text/html;charset=utf-8');
$photosName = $_POST['photosName'];
session_start();
//创建相册的文件夹
$result=@mkdir('../photoDatabase/'.iconv('utf-8', 'gbk',$_SESSION['name']));

$result=mkdir('../photoDatabase/'.iconv('utf-8', 'gbk',$_SESSION['name']).'/'.iconv('utf-8', 'gbk',$photosName));

if($result){
    //在数据库中保存数据
    include ('./mysqli.html');
    $sql = "insert into album values(null,{$_SESSION['id']},'{$photosName}')";
    mysqli_query($link,$sql);
    mysqli_close($link);
    echo "<script>alert('创建成功');window.location.href='../photo.php?right=4'</script>";
}else{
    echo "<script>alert('创建失败');window.location.href='../photo.php?right=3'</script>";
}
