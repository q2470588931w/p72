<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/20
 * Time: 16:28
 */
class UserPass extends Controllar
{
    //模型类
    public function __construct()
    {
        parent::__construct();
        $this->_model = Factory::newOB('UserPassModel');
    }
    //获取用户信息
    public function my(){
        $result = $this->_model->getuser();
        $this->_view->assign('u_login',$result);
        $this->_view->display('myPass/my.tpl');
    }
    //修改密码框框
    public function temp1(){
        $this->_view->display('myPass/password.tpl');
    }
    //修改
    public function modify(){
        //print_r($_POST);
        if(isset($_POST['name'])){
            $name =  $_POST['name'];
            if(empty($name)){
                echo "<script>alert('请不要乱按')</script>";
                $this -> index();
                exit;
            }
            $result = $this->_model->modify($name,1);
            if($result){
                echo 1100;
            }else{
                echo $result;
            }
        }else{
            $pass =  $_POST['pass'];
            if(empty($pass)){
                echo "<script>alert('请不要乱按')</script>";
                $this -> index();
                exit;
            }
            $result = $this->_model->modify($pass,2);
            if($result){
                echo 1100;
            }else{
                echo $result;
            }
        }
    }
    //检验密码
    public function md5($s){
        echo md5($s);
    }
    //修改账号框框
    public function temp2(){
        $this->_view->display('myPass/user.tpl');
    }
}