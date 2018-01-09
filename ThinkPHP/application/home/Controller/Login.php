<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/4
 * Time: 15:38
 */

namespace app\home\Controller;

use think\Controller;
use think\Request;
use think\Session;


class Login extends Controller
{
    //登录页面
    public function login(){
        return $this->fetch();
    }
    //注册页面
    public function register(){
        return $this->fetch();
    }
    //处理邮箱注册
    public function email(){
        //var_dump($_POST);exit;
        $request = Request::instance();
        $pass = $request->param('password');
        $e_mail = $request->param('email');
        $data = array(
            'email'     => $e_mail,
            'password'  => $pass,
        );
        $validate = validate('User');
        //var_dump($validate);exit;
        if(!$validate ->scene('email')->batch()->check($data)){
            echo json_encode($validate->getError());
            exit;
        };
        $data = array(
            'email'     => $e_mail,
            'pass'      => md5($pass),
        );
        //var_dump($data);exit;
        $user = model('User');
        //var_dump($user);exit;
        $ret=$user -> register($data);
        //var_dump($ret);exit;
        if($ret==true){
            echo 1100;
        }else{
            echo '$ret';
        }
    }
    //激活邮箱账号
    public function takemaile(){
        $mid  = $_GET['id'];
        $id   = substr($mid,19,32);
        $user = model('Ho_user');
        $All  = $user -> field('id')->select();
        $ko = false;
        foreach($All as $val){
            if($id==md5($val)){
                $id = $val;
                $ko = true;
                break;
            }
        }
        if($ko){

        }else{
            $this->error();
        }
    }
    //处理手机注册
    public function phone(){
        $request = Request::instance();
        $pass    = $request->param('password');
        $phone   = $request->param('phone');
        $code    = $request->param('code');
        $myCode  = Session::get('code');
        if($code!=$myCode){
            Session::delete('code');
            echo "验证失败，请从新获取";
            exit;
        }
        $data = [
            'phone' => $phone,
            'pass'  => $pass,
        ];
        $validate = validate('User');
        if(!$validate->scene('phone')->batch()->check($data)){
            echo json_encode($validate->getError());
            exit;
        };
        $user = model('User');
        $ret=$user -> register($data);
        if($ret==true){
            echo 1100;
        }else{
            echo '$ret';
        }
    }
}