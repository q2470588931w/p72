<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/24
 * Time: 14:00
 */
class AdminLogin extends BaseControllar
{
    //后台登录界面
    public function login(){
        $this->_view->display('login.html');
    }
    //登录处理界面
    public function loginIN(){
        $user=$_POST['user'];
        $pwd=md5($_POST['pwd']);
        //print_r($_POST);

        if(empty($user)||empty($pwd)){
            echo 1101;exit;
        }
        $suss=Factory::newOB('UserModel');
        $suss->where('user',$user);
        $result=$suss->get('user_login');
        //print_r($result);
        if($result){
            if($result[0]['pass']==$pwd){
                $arr = array(
                    'ID'       => $result[0]['id'],
                    'gID'       => $result[0]['gid'],
                    'loginTime' => date('Y-m-d H:i:s',time()),
                    'loginIP'   => $_SERVER['SERVER_ADDR'],
                );
                $res=$suss->loginUse('user',$arr);
                //var_dump($res);exit;
                if($res){
                    $this->isSession();
                    $_SESSION['gid']  = $result[0]['gid'];
                    $_SESSION['id']   = $result[0]['id'];
                    $_SESSION['name'] = $result[0]['user'];
                    echo 2;
                }else{
                    echo 3;
                }
                //$result=$suss->getSQL();

            }else{
                echo 1;
            }
        }else{
            echo 0;
        }
    }
    //退出处理
    public function quit()
    {
        $this->isSession();
        $_SESSION = array();
        header("location:".NOW_HTTP.'adminLogin/login');
    }
}