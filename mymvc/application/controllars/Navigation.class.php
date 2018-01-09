<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/18
 * Time: 12:28
 */
class Navigation extends Controllar
{
    //model实例化的类
    public function __construct()
    {
        parent::__construct();
        $this->_model = Factory::newOB('NavigationModel');
    }
    //浏览页面
    public function index(){
        $result  =  $this->_model->getNavigation();
        //print_r($result);exit;
        $this->_view->assign('navigation',$result);
        $this->_view->display('Navigation/Navigation.tpl');
    }
    //栏目
    public function homePage(){
        $this->_view->display('Navigation/home_page.tpl');
    }
    //添加导航栏
    public function addNavigation(){
        if(isset($_POST['pName'])){
            $pName     = $_POST['pName'];
            $pUrl     = $_POST['pUrl'];
            //var_dump($_POST);exit;
            $fID       = isset($_POST['fID'])?$_POST['fID']:0;
            if(empty($pName[0])||empty($pUrl[0])){
                echo "<script>alert('请完整填写信息')</script>";
                $this->_view->display('Navigation/addNavigation.tpl');
                exit;
            }
                $vals = '';
                foreach ($pName as $key=>$val){
                    $navigation    = array(
                        'ID'       => '',
                        'pName'    => $pName[$key],
                        'pUrl'     => $pUrl[$key],
                        'fID'      => isset($fID[$key])?$fID[$key]:0,
                    );
                    $result        = $this->_model->addNavigation($navigation);
                    if(!$result){
                        $vals .= $key.'\\';
                    }
                }
                if($vals){
                    echo '第'.$vals.'数据失败';
                }else{
                    $this->index();
                }
        }
        else{
            $this->_view->display('Navigation/addNavigation.tpl');
        }

    }
    //添加子栏目
    public function addChild()
    {
        //print_r($_POST);
        $name = $_POST['name'];
        $url = $_POST['url'];
        $pid = $_POST['pid'];
        if(empty($name)||empty($url)||empty($pid)){
            exit('请填写完整的信息');
        }
        $dataInsert = array(
            'pName' => $name,
            'pUrl'  => $url,
            'fID' => $pid,
        );
        $result        = $this->_model->addNavigation($dataInsert);
        //echo $sql = $this->$this->_model->getSQL();
        //echo $result;
        if($result){
           echo 1100;
        }else{
            echo $result;
        }


    }
    //添加栏目小框框
    public function temp1(){
        $this->_view->display('Navigation/addtpl.tpl');
    }
    //删除栏目
    public function dropNavigation($id){
        //echo $id ;exit;
        $result = $this->_model->dropNavigation($id);

        if($result==true){
            echo "<script>alert('成功');</script>";
            $this->index();
        }else{
            echo "<script>alert('".$result."');</script>";
            $this->index();
        }
    }
    //添加logo
    public function logo(){
        //var_dump($_FILES);
        if(isset($_FILES['logo'])){
            $fils     = $_FILES['logo'];
            //var_dump($fils);
            $result   = $this->_model->logo($fils);
            //var_dump($result);
            $this->_view->assign('logo',NOW_HTTP.'static/Navigation/'.$result);
            $this->_view->display('Navigation/logo.tpl');
        }else{
            $ret= $this->_model->getlogo();
            //print_r($ret);exit;
            $this->_view->assign('logo',$ret);
            $this->_view->display('Navigation/logo.tpl');
        }
    }
    //更改地址
    public function temp2(){
        $this->_view->display('Navigation/change.tpl');
    }
    //更改方法
    public function changeurl(){
        $url = $_POST['url'];
        $id  = $_POST['pid'];
        if(empty($url)||empty($id)){
            echo '不能为空';
            exit;
        }
        $ret=$this->_model->changeurl($id,$url);
        if($ret==true){
            echo 1100;
        }else{
            echo $ret;
        }
    }
}