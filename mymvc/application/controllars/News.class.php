<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/14
 * Time: 10:57
 */
class News extends Controllar
{
    //model实例化的类
    public function __construct()
    {
        parent::__construct();
        $this->_model = Factory::newOB('NewsModel');
    }
    //新闻二级解析
    public function newTwo(){
        $this->_view->display('two/newTwo.tpl');
    }
    //新闻主页
    public function newss(){

        $newss = $this->_model->getAllNews();
        //$sql = $this->_model->getSQL();
        //echo $sql;
        //print_r($newss);exit;
        $this->_view->assign('news',$newss);
        $this->_view->display('news/new.tpl');
    }
    //新闻添加
    public function addNew(){
        //$this->_model = new News();
        $result=$this->_model->getNathar();
        //print_r($result);exit;
        $this->_view->assign('nathar',$result);
        $this->_view->display('news/add.tpl');
    }
    //添加新闻
    public function addNews(){
        //print_r($_POST);
        //print_r($_FILES);
        $title = $_POST['title'];
        $time = $_POST['time'];
        $author = $_POST['author'];
        $naID = $_POST['naID'];
        $text = $_POST['text'];
        //print_r($_POST);exit;
        //$files = $_FILES['picture'];
        if(empty($title)||empty($time)||empty($author)||empty( $naID)||empty($text)){
            echo "<script>alert('请填写完您的信息')</script>";
            $this->_view->display('news/add.tpl');
            exit;
        }
        //将图片保存
        $panding=true;
      /*  $result=$this->_model->picture($files,$title);
       if(!is_array($result)){
           $panding=false;
           echo "<script>alert(".$result.")</script>";exit;
       }else{
           $PHrl = implode($result);
       }*/
        //将文档保存
        $ress=$this->_model->text($text,$title);
        if(!is_array($ress)){
            $panding=false;
            echo "<script>alert(".$ress.")</script>";exit;
        }else{
            $nUrl = implode($ress);
        }
        $news = array(
            'nTitle'  => $title,
            'nTime'   => $time,
            'author'  => $author,
            'naID'    => $naID,
            'nUrl'    => $nUrl
        );
        //保存资料
        if($panding){
            if($this->_model->intonews($news)){
                header('location:'.NOW_HTTP.'news/newss');
            }else{
                header('location:'.NOW_HTTP.'news/newss');
            }
        }else{
            return false;
        }
    }
    //新闻性质管理
    /**
     * @return Smarty
     */
    public function newNathar()
    {
        //$this->_model = new News();
        $result=$this->_model->getNathar();
        //print_r($result);exit;
        $this->_view->assign('nathar',$result);
        $this->_view->display('news/nathar.tpl');
    }
    //删除性质
    public function dropNathar($id){
        //echo $id;
        $result=$this->_model->dropNathar($id);
        $this->isok($result);
    }
    //添加性质
    public function addNathar(){
        //echo NOW_HTTP;exit;
        $name = $_POST['nathar'];
        if(empty($name)){
            echo "<script>alert('请填写完您的信息')</script>";
            $this->newNathar();
            exit;
        }
        //echo $name;
        $result=$this->_model->addNathar($name);
       $this->isok($result);
    }
    //判定是否执行成功
    private function isok($result){
        if($result==true){
            echo "<script>alert('成功')</script>";
            $this->newNathar();
        }else{
            echo "<script>alert('失败；".$result."')</script>";
            $this->newNathar();
        }
    }
    //删除数据
    public function recycleBin($id){
        $result=$this->_model->recycle_bin($id);
        $this->isok($result);
    }
    //轮播图
    public function Carousel(){
        if(isset($_FILES['Carousel'])){
            $arr = $_FILES['Carousel'];
            $ret = $this->_model->picture($arr);
            $this->isok($ret);
        }else{
            $ret=$this->_model->getCarousel();
            $this->_view->assign('Carousel',$ret);
            $this->_view->display('news/carousel.tpl');
        }
    }
    //删除轮播图
    public function dropCarousel($id){
        $ret = $this->_model->dropCarousel($id);
        if($ret==true){
            echo "<script>alert('成功')</script>";
            $this->Carousel();
        }else{
            echo "<script>alert('失败；".$ret."')</script>";
            $this->Carousel();
        }
    }
    //修改轮播图
    public function changeCarousel(){
        //print_r($_POST);exit;
        $id = $_POST['order'];
        $cid = $_POST['cID'];
        $ret=$this->_model->changeCarousel($cid,$id);
        //echo $this->_model->getSQL();exit;
        if($ret==true){
            echo "<script>alert('成功')</script>";
            $this->Carousel();
        }else{
            echo "<script>alert('失败；".$ret."')</script>";
            $this->Carousel();
        }
    }
    //图片上次
    public function upload(){
        var_dump($_FILES);exit;
        $this->_model->upload();
    }
}