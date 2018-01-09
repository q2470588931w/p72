<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/7
 * Time: 10:26
 */
class BaseControllar{
    protected $_view;
    protected $_model;
    public function __construct()
    {
        if($this->_view){
            return $this->_view;
        }
        $this->_view = Factory::newOB('Smarty');
        $this->_view->compile_dir  = NOW_PATH.'application/views_c';
        $this->_view->template_dir = NOW_PATH.'application/views';
        $this->_view->assign('url',NOW_HTTP);
        $this->_view->assign('cssUrl',NOW_HTTP.'static/css/');
        $this->_view->assign('jsUrl',NOW_HTTP.'static/js/');
        $this->_view->assign('imgUrl',NOW_HTTP.'static/img/');
        $this->_view->assign('layUrl',NOW_HTTP.'static/layui/');
    }
    protected function isSession(){
        if(!isset($_SESSION)){
            session_start();
        }
    }
}