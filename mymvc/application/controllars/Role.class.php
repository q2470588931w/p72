<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/23
 * Time: 16:17
 */
class Role extends Controllar
{
    public function __construct()
    {
        parent::__construct();
        $this->_model = Factory::newOB('RoleModel');
    }
    //二级
    public function left(){
        $this->_view->display('two/role.tpl');
    }
    //主页
    public function index(){
        $ret=$this->_model->getall();
        $this->_view->assign('role',$ret);
        $this->_view->display('role/role.tpl');
    }
    //添加
    public  function addRole(){
        if(isset($_POST['mName'])){
            $mName        = $_POST['mName'];
            $mEnglishName = $_POST['mEnglishName'];
            $author       = $_POST['author'];
            $levalName    = $_POST['levalName'];
            $modelName    = $_POST['modelName'];
            if(isset($_POST['mID'])){
                $mID = $_POST['mID'];
                if(empty($mName)||empty($mID)||empty($levalName)||empty($modelName)||empty($author)||empty($mEnglishName)){
                    echo "<script>alert('内容不能为空')</script>";
                    $this->index();
                    exit;
                }
                $arr=array(
                    'mName'         => $mName,
                    'mEnglishName'  => $mEnglishName,
                    'author'        => $author,
                    'modelName'     => $modelName,
                    'levalName'     => $levalName,
                );
                $ret=$this->_model->change($mID,$arr);
                $this->isok($ret);
            }
            else{
                $cID          = $_POST['cID'];
                $birthday     = $_POST['birthday'];
                $mImg         = $_FILES['mImg'];
                if(empty($mName)||empty($levalName)||empty($modelName)||empty($cID)||empty($author)||empty($birthday)||empty($mEnglishName)||empty($mImg['name'])){
                    echo "<script>alert('请完整填写信息')</script>";
                    $this->index();
                    exit;
                }
                //保存图标
                $mImg=$this->_model->picture($mImg);
                //保存资料
                $arr=array(
                    'mName'         => $mName,
                    'mEnglishName'  => $mEnglishName,
                    'mImg'          => $mImg,
                    'cID'           => $cID,
                    'author'        => $author,
                    'birthday'      => $birthday,
                    'modelName'     => $modelName,
                    'levalName'     => $levalName,
                );
                $ret=$this->_model->role($arr);
                $this->isok($ret);
            }

        }
        else{
            $ret=$this->_model->getcamp();
            $this->_view->assign('camp',$ret);
            $this->_view->display('role/addrole.tpl');
        }

    }
    //阵营管理
    public  function camp(){
        $ret=$this->_model->getcamp();
        $this->_view->assign('camp',$ret);
        $this->_view->display('role/camp.tpl');
    }
    //添加阵营
    public function addcamp(){
        if(isset($_POST['cName'])){
            $cName = $_POST['cName'];
            $cEnglishName = $_POST['cEnglishName'];
            $cImg = $_FILES['cImg'];
            if(empty($cName)||empty($cEnglishName)||empty($cImg['name'])){
                echo "<script>alert('请完整填写信息')</script>";
                $this->index();
                exit;
            }
            //保存图标
            $cImg=$this->_model->picture($cImg);
            //保存资料
            $arr=array(
                'cName'         => $cName,
                'cEnglishName'  => $cEnglishName,
                'cImg'          => $cImg
            );
            $ret=$this->_model->camp($arr);
            $this->isok($ret);
        }
        else{
            $this->_view->display('role/addcamp.tpl');
        }
    }
    //删除阵营
    public function dropcamp($cID){
        $this->_model->where('cID',$cID);
        $ret=$this->_model->delete('camp');
        $this->isok($ret);
    }
    //判断是否成功
    protected function isok($ret){
        if($ret==true){
            echo "<script>alert('成功')</script>";
            $this->index();
        }else{
            echo "<script>alert('失败".$ret."')</script>";
            $this->index();
        }
    }
}