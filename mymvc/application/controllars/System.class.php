<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/20
 * Time: 18:26
 */
class System extends Controllar
{
    //model实例化的类
    public function __construct()
    {
        parent::__construct();
        $this->_model = Factory::newOB('SystemModel');
    }
    //系统管理
    public function index()
    {
        $System = $this->_model->index();
        $Systembar = $this->_model->getSystembar();
        //print_r($System);exit;
        $this->_view->assign('System',$System);
        $this->_view->assign('Systembar',$Systembar);
        $this->_view->display('System/System.tpl');
    }
    //分栏管理
    public function left()
    {
        $this->_view->display('two/System.tpl');
    }
    //栏目管理
    public function Systembar()
    {
        if(isset($_POST['Systembar'])){
            $Systembar = $_POST['Systembar'];
            $ret=$this->_model->Systembar($Systembar);
            if($ret==true){
                echo "<script>alert('成功')</script>";
                $this->index();
            }else{
                echo "<script>alert('失败“".$ret."”')</script>";
                $this->index();
            }
        }else{
            $ret = $this->_model->getSystembar();
            $this->_view->assign('Systembar',$ret);
            $this->_view->display('System/Systembar.tpl');
        }
    }
    //添加小栏目
    public function temp1(){
        $this->_view->display('System/addtpl.tpl');
    }
    //判断
    protected function isok($ret){
        if($ret==true){
            echo "<script>alert('成功')</script>";
            $this->index();
        }else{
            echo "<script>alert('失败“".$ret."”')</script>";
            $this->index();
        }
    }
    //添加内容
    public function changeSystem(){
        //print_r($_POST);
        $sbID = $_POST['sbID'];
        $System = $_POST['System'];
        if(empty($sbID)||empty($System)){
            echo "<script>alert('请不要乱按')</script>";
            exit;
        }
        $ret=$this->_model->changeSystem($sbID,$System);
        $this->isok($ret);
    }
    //修改
    public function changes(){
        //print_r($_POST);
        $cID = $_POST['cID'];
        $name = $_POST['Systembar'];
        if(empty($cID)||empty($name)){
            echo "<script>alert('请不要乱按')</script>";
            exit;
        }
        $ret=$this->_model->changes($cID,$name);
        $this->isok($ret);
    }
    //添加全部内容
    public function system(){
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        if(empty($name)||empty($pass)){
            echo "数据不能为空";
            exit;
        }
        $ret=$this->_model->System($name, $pass);
        if($ret==true){
            echo 1100;
        }else{
            echo $ret;
        }
    }
    //全部删除
    public function dropAll($sbID){
        $ret=$this->_model->dropAll($sbID);
        $this->isok($ret);
    }
    //友情链接
    public function friendship(){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $url  = $_POST['pass'];
            if(empty($name)||empty($url)){
                echo '内容不完整';
                exit;
            }
            $ret=$this->_model->friendship($name,$url);
            if($ret==true){
                echo 1100;
            }else{
                echo $ret;
            }
        }else{
            $ret=$this->_model->getFriend();
            $this->_view->assign('friendship',$ret);
            $this->_view->display('System/friendship.tpl');
        }

    }
    //修改友情链接
    public function takefriendship($a){
        if(isset($a)){
            $ret=$this->_model->dropfriendship($a);
            $this->isok($ret);
        }
        else{
            $id=$_POST['id'];
            $name=$_POST['name'];
            $url=$_POST['url'];
            if(empty($id)||empty($name)||empty($url)){
                echo "<script>alert('请不要乱按')</script>";
                exit;
            }
            $ret=$this->_model->changefriendship($id,$name,$url);
            $this->isok($ret);
        }
    }
}