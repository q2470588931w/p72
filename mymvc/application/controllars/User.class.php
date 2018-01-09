<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/20
 * Time: 15:34
 */
class User extends Controllar
{
    //model实例化的类
    public function __construct()
    {
        parent::__construct();
        $this->_model = Factory::newOB('UserModel');
    }
    public function left(){
        $this->_view->display('two/user.tpl');
    }
   //主页
    public function index(){
        $result = $this->_model -> getUser();
        $this->_view->assign('user',$result);
        $this->_view->display('user/userMen.tpl');
    }
    //添加分类
    public function adduser(){
        $pName = $_POST['pName'];
        if(empty($pName)){
            echo "<script>alert('请不要乱按')</script>";
            $this -> index();
            exit;
        }
        $result = $this->_model->add($pName);
        $this->isok($result);
    }
    //判断是否成功
    private function isok($result){
        if($result){
            echo "<script>alert('成功')</script>";
            $this->index();
        }else{
            echo "<script>alert('失败".$result."')</script>";
            $this ->index();
        }
    }
    //删除
    public function drop($id){
        $gID = $id;
        $result = $this->_model->drop($gID);
        $this->isok($result);
    }
    //修改小页面
    public function temp1(){
        $this->_view->display('user/modify.tpl');
    }
    //修改
    public function modify(){
        //print_r($_POST);
        $pName =  $_POST['pName'];
        $pid   =  $_POST['pid'];
        if(empty($pName)||empty($pid)){
            echo "<script>alert('请不要乱按')</script>";
            $this -> index();
            exit;
        }
        $result = $this->_model->modify($pid,$pName);
        if($result){
            echo 1100;
        }else{
            echo $result;
        }
    }
    //管理用户页面
    public function users(){
        $ret=$this->_model->getUser();
        $this->_view->assign('grade',$ret);
        $my=$this->my();
        $this->_view->assign('my',$my);
        $ret = $this->_model->getMen();
        //echo $this->_model->getSQL();
        //print_r($ret);exit;
        $this->_view->assign('men',$ret);
        $this->_view->display('user/men.tpl');
    }
    //添加新用户小口
    public function temp2(){
        $ret=$this->_model->getUser();
        array_shift($ret);
        $this->_view->assign('grade',$ret);
        $this->_view->display('user/addtpl.tpl');
    }
    //添加用户处理
    public function takeuser(){
        //print_r($_POST);
        $name =  $_POST['name'];
        $pass   =  $_POST['pass'];
        $grade   =  $_POST['grade'];
        if(empty($pass)||empty($name)||empty($grade)){
            echo "<script>alert('请不要乱按')</script>";
            $this -> index();
            exit;
        }
        $arr = array(
            'user' => $name,
            'pass' => md5($pass),
            'gid'  => $grade
        );
        $ret=$this->_model->takeuser($arr);
        if($ret){
            echo 1100;
        }else{
            echo $ret;
        }
    }
    //删除
    public function dropMen($id){
        $ret=$this->_model->dropMen($id);
        $this->isok($ret);
    }
    //我的账号
    protected function my(){
        $model=Factory::newOB('UserPassModel');
        return $model->getuser();
    }
}