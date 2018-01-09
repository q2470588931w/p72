<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/5
 * Time: 11:52
 */
header("content-type:text/html;charset=utf-8");
//定义一个当前文件目录的常量
define('NOW_PATH',__DIR__.'\\');
//常量当前的域名
define('NOW_HTTP','http://'.$_SERVER['HTTP_HOST'].'/');

//print_r($_SERVER);exit;
//定义是否开启调试模式的常量
define('NOW_DEBUG',true);
//初始化数据配置
$config = require (NOW_PATH.'config/config.php');
/*var_dump($config);exit;*/
//引入核心类
require (NOW_PATH.'core/Core.class.php');
//实例化
(new Core($config))->run();