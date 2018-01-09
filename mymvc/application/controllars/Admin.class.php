<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/12
 * Time: 9:35
 *
 */
class Admin extends Controllar {
    //主页加载
    public function __construct()
    {
        parent::__construct();
        $this->_model = Factory::newOB('AdminModel');
    }

    public function index()
    {
        $this->_view->display('admin.tpl');
    }
    //解析头部信息
    public function top()
    {
       $this->isSession();
        $name = $_SESSION['name'];
        //var_dump($name);exit;
        $this->_view->assign('name',$name);
        $this->_view->display('one/top.tpl');

    }
    //左边菜单信息
    public function left()
    {
        $this->_view->display('two/left.tpl');
    }
    //右边菜单信息
    public function right()
    {
        $this->_view->display('right.tpl');
    }
    //首页内容
    public function indexi(){
        $this->isSession();
        $loginIP = $_SESSION['loginIP'];
        $loginTime = $_SESSION['loginTime'];
        $result=$this->_model->getuser();
        $this->_view->assign('admin',$result);
        $this->_view->assign('loginIP',$loginIP);
        $this->_view->assign('loginTime',$loginTime);
        $this->_view->display('index/indexi.tpl');
    }
}