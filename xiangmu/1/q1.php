<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/28
 * Time: 16:25
 * 网站登录是靠什么判断？
 *
 * 判断session是否存在
 *
 *
 *
 *
 */

$_POST['name'];
$_POST['sex'];
$_POST['age'];
$_POST['phone'];

$sql = "select * form users";

if(name || sex ||  age || phone){
    $sql .= " where";
    $where = [];
    if(name){
        $where[] = " name={name} ";
    }

    if(sex){
        $where[] = " sex={sex} ";
    }

    ...

   $sql .= implode("and",$where);   // name={name} and sex={sex} and..
}

select * from users wehre name={name} and sex={sex}..


条件筛选（form 表单使用get）
$_SERVER[''].page=1
<a href="?"></a>


session_start();
echo session_name(),'-',session_id();
setcookie(session_name(),session_id(),time()+60*60*1);
$_SESSION['name'] = 'zhangsan';
?>
<a href="./q2.php">下一页</a>

