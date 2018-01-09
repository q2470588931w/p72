<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/5
 * Time: 13:37
 */
//数据库的初始值
$config['db']['host']     = 'localhost';
$config['db']['userName'] = 'root';
$config['db']['password'] = 'root';
$config['db']['dbname']   = 'bar';

//默认执行的类名
$config['controllerName'] = 'Index';
//默认执行的方法名
$config['funcName'] = 'index';
return $config;