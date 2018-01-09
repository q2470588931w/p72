<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 18:32
 */
header('content-type:text/html;charset=utf-8');
session_start();
/*echo $_SESSION['user'];
exit;*/
//防止进入
if(@!$_SESSION['user']){
    echo "<script>alert('请登录');window.location.href='./login.php'</script>";
}
$mainRight = 1;


if(@$_GET['right']){
    $mainRight = $_GET['right'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>人员管理</title>
    <link href="./includs/css/main.css" rel="stylesheet">
    <link href="photoInclud/css/photos.css" rel="stylesheet">

    <style>

    </style>
</head>
<body>
<div class="main">
    <div class="main_top">
        <?php include'./includs/head.html'; ?>
    </div>
    <div class="main_body">
        <div class="main_left">
            <?php include'./includs/photo_left.html'; ?>
        </div>
        <div class="main_right">
            <!-- 相册管理页面-->
            <?php if($mainRight==1):?>
                <div class="photo_top">
                    相册管理
                    <hr/>
                    <div class="photo_top_left">
                        <?php include('./photoInclud/search.html') ?>
                    </div>
                    <div class="photo_top_right">
                        <button><a href="?right=4">+添加相片</a></button>
                        <button><a href="?right=3">+添加相册</a></button>
                    </div>
                </div>
                <div class="add">
                    <?php if(@$_GET['photoName']){
                        include('./photoInclud/searchAlbum.html');
                    }else{
                        include('./photoInclud/album.html');
                    } ?>
                </div>

            <?php endif;?>
            <!-- 相册详情页-->
            <?php if($mainRight==2):?>
                <div class="right_top" >
                    <span>相册详情</span>
                    <button><a href="javascript:history.back()">返回</a></button>
                </div>
                <div class="add">
                    <?php include'./photoInclud/photos.html'; ?>
                </div>
            <?php endif;?>
            <!-- 相册添加页面-->
            <?php if($mainRight==3):?>
                <div class="right_top" >
                    <span>添加新相册</span>
                    <button><a href="javascript:history.back()">返回</a></button>
                </div>
                <div class="add">
                    <?php include'./photoInclud/add.html'; ?>
                </div>
            <?php endif;?>
            <!-- 相片添加页面-->
            <?php if($mainRight==4):?>
                <div class="right_top" >
                    <span>添加相片</span>
                    <button><a href="javascript:history.back()">返回</a></button>
                </div>
                <div class="add">
                    <?php include './photoInclud/photoadd.html'?>
                </div>
            <?php endif;?>
        </div>
    </div>

</div>

<script>
    window.onload=function(){
        all_li=document.getElementsByTagName('li');
        for(var i=0;i<all_li.length;i++){
            all_li[i].index=i;
            //console.log(all_li[i].index);
            all_li[i].onclick=function(){

                n=this.index;
                //console.log(n);
                tiao(n);
            }
        }
    }
    function tiao(o){
        if(o){
            window.location.href='./photo.php?right=1';
        }else {
            window.location.href='./guanli.php?right=1';
        }
    }

</script>
</body>
</html>