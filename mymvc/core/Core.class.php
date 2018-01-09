<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/5
 * Time: 13:46
 */
class Core{
    //一个接受初始化数据的属性
    private $config = [];
    //构造方法接受并初始化数据
    public function __construct($config)
    {
        $this->config = $config;
    }
    //执行方法
    public function run(){
        //echo 'hello word';
        //自动加载功能
        spl_autoload_register(array($this,'loads'));
        //设置数据库参数
        $this->setDB();
        //设置调试模式
        $this->setIni();
        //加载对应的类 方法
        $this->route();
    }
    //设置是否启用调试模式
    private function setIni(){
        if(NOW_DEBUG){
            //打开报错信息显示
            ini_set('display_errors','On');
        }else{
            //关闭报错信息显示
            ini_set('display_errors','Off');
            //打开错误日志
            ini_set('log_errors','On');
        }
    }
    //设置数据库常量
    private function setDB(){
        $dbs = $this->config['db'];
        //print_r($dbs);
        define('DB_HOST',$dbs['host']);
        define('DB_USER',$dbs['userName']);
        define('DB_PASS',$dbs['password']);
        define('DB_NAME',$dbs['dbname']);

        //echo DB_HOST,DB_USER,DB_PASS,DB_NAME;
    }
    //对url的处理
    private function route(){
        //初始化数据
        $constrollerName = $this->config['controllerName'];
        $funcName        = $this->config['funcName'];
        //print_r($_SERVER);exit;
        //运用超全局变量查询地址信息
        $url = $_SERVER['REQUEST_URI'];
        //print_r($url) ;exit;
        //在获取的地址上查询？的下标数字
        $foot = strpos($url,'?');
        //三目运算判断，如果没有？ 则反馈原来的值，否则截取前半段
        $one  = $foot === false?$url:substr($url,0,$foot);
        //echo $one;
        //去除两边的/
        $one  = trim($one,'/');
        //echo $one;
        $pars = array();
        //有传入任何数据
        if($one){
            //将字符串改成一个数组
            $nameArr = explode('/',$one);
            //var_dump($nameArr);
            //去除空的数组  过滤掉所以的空的 空白的 等错数组
            $nameArr = array_filter($nameArr);
            //将获取的值给到变量中
            $constrollerName = isset($nameArr[0])?ucfirst($nameArr[0]):$constrollerName;
            //去除第一个数组  起返回值是去除的元素
            //var_dump($nameArr);
            array_shift($nameArr);
            //var_dump($nameArr);
            $funcName = isset($nameArr[0])?$nameArr[0]:$funcName;
            //echo $funcName,$constrollerName;
            //接受传入的参数
            array_shift($nameArr);
            $pars = $nameArr == array()?array():$nameArr;
        }
        //检测类文件是否存在,如果出错，不会进入到这里，错误判断省略
        class_exists($constrollerName);
        if(!method_exists($constrollerName,$funcName)){
            exit('不纯在该方法');
        }
        //实例化控制器对象
        $constroller = new $constrollerName;
        //调用内部方法
        //$constroller->$funcName();exit;
        call_user_func_array(array($constroller,$funcName),$pars);
    }
    //自动加载
    private static function loads($name){
        //拼接传入的类名
        $controllarName = NOW_PATH.'application\controllars\\'.$name.'.class.php';
        $modelName = NOW_PATH.'application\models\\'.$name.'.class.php';
        $smartyName = NOW_PATH.'core\libs\\'.$name.'.class.php';
        $coreName = NOW_PATH.'core\\'.$name.'.class.php';
        //echo $controllarName;exit;
        //判断类名是否存在
        if(file_exists($controllarName)){
            require ($controllarName);
        }elseif (file_exists($modelName)){
            require ($modelName);
        }elseif (file_exists($smartyName)){
            require ($smartyName);
        }elseif (file_exists($coreName)){
            require ($coreName);
        }
        else{
            exit('对不起'.$name.'.php 不存在');
        }
    }
}