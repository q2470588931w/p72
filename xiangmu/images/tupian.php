<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 14:09
 */

//1.创建画布资源
$img = imagecreatetruecolor(110,46);
//2.设置调色板
$red = imagecolorallocate($img,255,0,0);
$xianred = imagecolorallocate($img,220,20,60);
$baolan = imagecolorallocate($img,65,105,225);
$shenlinlu = imagecolorallocate($img,34,139,34);
$shenc = imagecolorallocate($img,255,140,0);
$gol = imagecolorallocate($img,255,215,0);
$green = imagecolorallocate($img,0,255,0);
$blue = imagecolorallocate($img,0,0,255);
$fng = imagecolorallocate($img,mt_rand(190,210),mt_rand(190,210),mt_rand(190,210));
//3.设置背景色
imagefill($img,0,0,$fng);
//4.操作
//颜色
$color = [$red,$xianred,$baolan,$shenlinlu,$shenc,$gol,$green,$blue];
//字体
$ziti = ['CutiveMono.ttf','DancingScript-Bold.ttf','DancingScript-Regular.ttf','DroidSans.ttf','DroidSans-Bold.ttf','DroidSansMono.ttf'];
//取出四个需要用到的字符
for($i=0;$i<4;$i++){
    $all = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    str_shuffle($all);
    $str[] = substr($all,mt_rand(1,36),1);
}
$code = implode('',$str);
session_start();
$_SESSION['code'] = $code;
//将取出的字符放到图片中
for($j=1;$j<=4;$j++){
    imagefttext($img,mt_rand(20,25),mt_rand(-15,15),$j*(mt_rand(15,18)),mt_rand(30,40),$color[mt_rand(0,7)],"./fonts/{$ziti[mt_rand(0,5)]}",$str[$j-1]);
}
//加入干扰线
for($i=0;$i<7;$i++){
    imageline($img,mt_rand(0,110),mt_rand(0,46),mt_rand(0,110),mt_rand(0,46),$color[mt_rand(0,7)]);
}
//加入干扰点
for($i=0;$i<50;$i++){
    imagesetpixel($img,mt_rand(0,110),mt_rand(0,46),$color[mt_rand(0,7)]);
}

//5.在页面上输出图片或者保存
header("Content-Type: image/png");
imagepng($img);
//6.关闭画布资源
imagedestroy($img);