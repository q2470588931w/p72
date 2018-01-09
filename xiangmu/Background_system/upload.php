<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 13:47
 */
session_start();
setcookie(session_name(),'',time()-100);
$_SESSION = array();
session_destroy();
header("Location: ../login.php");
