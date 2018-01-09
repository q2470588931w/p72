<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/21
 * Time: 17:34
 */
header('content-type:text/html;charset=utf-8');
session_start();
/*echo $_SESSION['user'];
print_r($_COOKIE);
exit;*/
//防止进
if(@!$_SESSION['user']){
    echo "<script>alert('请登录');window.location.href='./login.php'</script>";
}
error_reporting(0);
$mainRight = 1 ;
//提取数据
$link=mysqli_connect('localhost','root','root','work');
if(mysqli_connect_errno()){
    exit('数据库连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');
//用户表格栏
if($mainRight == 1){
    $oldPage = @$_GET['page']?intval($_GET['page']):1;    //是否有get的值，没有就设置为1
//每页的条数
    $tiao = 10;
    $name = (string)@$_GET['name'];
    $sex = (string)@$_GET['sex'];
    $phone = (string)@$_GET['phone'];
    $age = (int)@$_GET['age'];
if($name || $sex || $phone || $age){
    //提取全部满足条件数据
    $sql = "select * from users where";
    $where=[];
    if($name){
        $where[]=" name like '%$name%' ";
    }
    if($sex){
        $where[]= " sex='$sex' ";
    }
    if($phone){
        $where[]=" phone like '%$phone%' ";
    }
    if($age){
        $where[] = " age='$age' ";
    }
    $sql .= implode('and',$where);
    $allResult=mysqli_query($link,$sql);
    $AllStr = mysqli_num_rows($allResult);
    $rets = mysqli_fetch_all($allResult,MYSQLI_ASSOC);
    $rows = array_chunk($rets,$tiao)[$oldPage-1];
}else{
    //一共有多少条
    $allResult=mysqli_query($link,'select count(*) as tiao from users');

    $AllStr = mysqli_fetch_assoc($allResult)['tiao'];
    /*echo $lastOne;*/
    /*print_r($lastOne);*/
//最后一页
    $lastOne = ceil($AllStr/10);
    /*echo $lastOne;*/
//当前下标
    $page = ($oldPage-1)*$tiao;
//每次从下表几号获取3条
    $result = mysqli_query($link,"select * from users limit {$page},10");
//将资源变成数组
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    /*var_dump($rows);*/
}

}

//修改用户的数据接收和查询
if(@$_GET['id']){
    $id = $_GET['id'];
    /*echo $id;*/
    $rest=mysqli_query($link,"select * from users where id={$id}");

    $ret=mysqli_fetch_assoc($rest);
   /* print_r($ret);
    exit;*/

}

mysqli_close($link);
//人员管理，控制输出的页面管理编号

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
    <link href="./includs/css/men.css" rel="stylesheet">
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
                <?php include'./includs/men_left.html'; ?>
            </div>
            <div class="main_right">
                <!-- 人员管理页面-->
                <?php if($mainRight==1):?>
                    <div class="right_top" >
                        <div class="top_left" ><?php include'./includs/search.html'; ?></div>
                        <button><a href="guanli.php?right=2">添加新用户</a></button>
                    </div>
                    <div class="right_main">
                        <?php include'./includs/guan.html'; ?>
                    </div>
                <?php endif;?>
                <!-- 用户添加页面-->
                <?php if($mainRight==2):?>
                    <div class="right_top" >
                        <span>添加新用户</span>
                        <button><a href="javascript:history.back()">返回</a></button>
                    </div>
                    <div class="add">
                        <?php include'./includs/add.html'; ?>
                    </div>
                <?php endif;?>
                <!-- 用户修改页面-->
                <?php if($mainRight==3):?>
                    <div class="right_top" >
                        <span>修改用户</span>
                        <button><a href="javascript:history.back()">返回</a></button>
                    </div>
                    <div class="add">
                        <?php include'./includs/changes.html'; ?>
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
                window.location.href='./photo.php';
            }else {
                window.location.href='./guanli.php?right=1';
            }
        }



    </script>
</body>
</html>




