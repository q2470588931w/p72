<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/19
 * Time: 10:52
 * 权限设置类
 */
class Controllar extends BaseControllar
{
    protected  $uID;
    protected  $allowArr=array();
    public function __construct()
    {
        parent::__construct();
        $this->checkPermiss();
    }
    protected function checkPermiss(){
        $url      = $_SERVER['REQUEST_URI'];
        $position = strpos($url,'?');
        $url      = $position==false?$url:substr($url,0,$position);
        $url      = trim($url, '/');
        $class    = ucfirst(strstr($url,'/',true));
        //echo $class;exit;
        $classes    = array(
            'Index','AdminLogin'
        );
        if(!in_array($class,$classes)){
            //判断是否登录
            if(!$this->who()){
                echo "你没有权限操作";
                exit;
            }
            //var_dump($this->uID);exit;
            //如果保存有权限，则判断
            if($this->allowArr){
                $this->what($class);
            }
            //查找该用户的权限
            else{
                $suss   = Factory::newOB('AllowModel');
                $result = $suss->getallow($this->uID);
                //$result = array_column($result,'jName');
                //print_r($result);exit;
                $this->allowArr = $result;
                $this->what($class);
            }
        }
    }
    protected function what($class){
        if(!in_array($class,$this->allowArr)){
            echo "你没有权限操作";
            exit;
        }
    }
    protected function who(){
        //保存的权限数字
        //$whoto = isset($_COOKIE['gID'])?$_COOKIE['gID']:null;
        $this->isSession();
        $whoto = isset($_SESSION['id'])?$_SESSION['id']:null;
        //var_dump($_SESSION['id']);exit;
        if($whoto){
            $this->uID=$whoto;
            return true;
        }else{
            return false;
        }
    }
}