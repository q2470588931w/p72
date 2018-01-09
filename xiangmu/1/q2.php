<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/28
 * Time: 16:26
 */
session_start();

echo session_name(),'-',session_id(),'<br/>';
echo $_SESSION['name'];

/**
 * cookie
 * 将服务器少量数据存储在客户端（浏览器） cookie生存周期默认0，（浏览器相当于电脑，cookie数据就在内存中）
 *
 * http请求
 * 请求行： 请求方式 资源在服务器上的绝对路径 HTTP/1.1
 * 请求头信息： key: value\r\n
 * Host: www.baidu.com
 * Cookie: name=zhangsnaa
 *
 * 请求主体：（可以不设置）
 *
 *
 *session（会话控制）
 * 默认是基于cookie的机制
 * 1、需要在浏览器保存一个cookie。  PHPSESSID=随机字符串
 *
 * 2、提取sess_随机字符串文件数据，该文件中的数据就是当前浏览器存储的session数据
 *
 * session_start(); //setcookie('PHPSESSID',随机字符串)
 *
 * $_SESSION['name'] = 'zhangsan';
 *
 * 客户端禁用cookie，session失效
 *
 *
 *
 *
 */