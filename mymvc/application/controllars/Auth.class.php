<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 10:53
 * 权限分配
 */
class Auth extends Controllar
{
    public function __construct()
    {
        parent::__construct();
        $this->_model=Factory::newOB('AuthModel');
    }
    //更改密码
    public function change(){
        //print_r($_POST);exit;
        $id  = $_POST['id'];
        $gid = $_POST['grade'];
        $ret=$this->_model->change($id,$gid);
        if($ret){
            echo "<script>alert('成功')</script>";
            time_sleep_until(time()+10);
            header("location:".NOW_HTTP."user/users");
        }else{
            echo $ret;
        }
    }
    //权限首页
    public function index(){
        $ret = $this->_model->getgrade();
        $this->_view->assign('grade',$ret);
        $ret = $this->_model->index();
        $this->_view->assign('allow',$ret);
        $this->_view->display('Auth/user.tpl');
    }
    //分配
    public function take($gName){
        $all = $this->_model->getjuris();
        $had=$this->_model->getMyGrade($gName);
        $all=$this->taked2($all);
        $had=$this->taked2($had);
        //print_r($all);exit;
        //echo $this->_model->getSQL();
        //print_r($had);exit;
        $noth = array_diff($all,$had);
        //print_r($noth);exit;
        $this->_view->assign('had',$had);
        $this->_view->assign('not',$noth);
        $this->_view->display('Auth/take.tpl');
    }
    //降维处理
    private function taked2($arr){
        $narr=[];
        foreach($arr as $val){
            $v = implode(',',$val);
            $narr[] = $v;
        }
        return $narr;
    }
    //修改权利
    public function changeAuth()
    {
        $names = json_decode($_POST['name']);
        $gID = $_POST['gID'];
        //print_r($names);
        $ret=$this->_model->changeAuth($names,$gID);
        if($ret==true){
            echo 1100;
        }else{
            echo $ret;
        }
    }
}