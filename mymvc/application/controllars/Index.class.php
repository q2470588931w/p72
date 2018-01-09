<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/5
 * Time: 16:19
 */
class Index extends BaseControllar {
   /* public function welcome(){
        //echo '欢迎来到我的mvc世界';
        $user = new User_Model();
        $table = $user ->get('user');

        //var_dump($table);
        $sql = $user ->getSQL();
        //echo $sql;
        $this->_view->assign('name',$table);
        $this->_view->display('hello.tpl');
    }*/
    public function __construct()
    {
        parent::__construct();
        $this->_model = Factory::newOB('IndexModel');
    }

    //前端页面
    public function index(){

        //系统的相关数据
        $system=$this->_model->getsystem();
        $this->_view->assign($system);
        $this->_view->display('Reception/index.tpl');
    }
    //上
    public function top(){
        $this->getnavigation();
        $logo=$this->_model->getOne('logo');
        //var_dump($logo);exit;
        $this->_view->assign('logo',$logo);
        $this->_view->display('Reception/top/top.tpl');
    }
    //中
    public function body(){
        $this->getmen();
        $this->_view->display('Reception/body/body.tpl');
    }
    //下
    public function foot(){
        //系统的相关数据
        $system=$this->_model->getsystem();
        $this->_view->assign($system);
        //友情连接
        $friendship=$this->_model->getfriendship();
        $this->_view->assign('friendship',$friendship);
        $this->_view->display('Reception/foot/foot.tpl');
    }
    //获取轮播图
    protected function getcarousel(){
        $ret=$this->_model->get('carousel');
        $this->_view->assign('carousel',$ret);
    }
    //获取项目
    public function getnavigation(){
        $ret=$this->_model->getnavigation();
        $this->_view->assign('navigation',$ret);
    }
    //获取人物
    public function getmen(){
        $ret=$this->_model->getmen();
        //print_r($ret);exit;
        $this->_view->assign('men',$ret);
    }
    //新闻
    public function news(){
        $this->getcarousel();
        $this->getnews();
        $this->_view->display('Reception/body/news.tpl');
    }
    //获取新闻
    protected function getnews(){
        $this->_model->whereT('news.naID','new_nathar.naID');
         $ret=$this->_model->get('news,new_nathar');
        //print_r($ret);exit;
        $this->_view->assign('news',$ret);
    }
    //新闻内容
    public function temp1($nID){
        //var_dump($nID);exit;
        $nID=trim($nID,'(');
        $nID=trim($nID,')');
        $url=$this->_model->geturl($nID);
        $text = file_get_contents(iconv('utf-8','gbk',NOW_PATH.$url['nUrl']));
        $this->_view->assign('text',$text);
        $this->_view->display('Reception/body/temp.tpl');
    }

}