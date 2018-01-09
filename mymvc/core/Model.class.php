<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/7
 * Time: 11:33
 */
class Model
{
    protected $table  = null;          //表格名
    protected $where  = '';        //条件
    protected $sql    = '';          //sql语句
    protected $value  = '';          //插入的数据
    protected $key    = '';          //插入的数据的字段名
    protected $error  = '0';          //错误号
    protected $setVal = '';         //修改的内容
    protected $select = '*';        //查询所有
    //条件初始化
    protected function _key(){
         $this->table  = null;
         $this->where  = '';
         $this->value  = '';
         $this->key    = '';
         $this->error  = '0';
         $this->setVal = '';
         $this->select = '*';
    }
    //获取数据库所以的数据
    public function get($table){
        $this->_Testing($table);
        if($this->where){
            $this->sql = sprintf('select %s from %s where %s',$this->select,$this->table,$this->where);
            return $this->_go(2);
        }else{
            $this->sql = sprintf('select %s from %s',$this->select,$this->table);
            return $this->_go(2);
        }
    }
    //修改查询参数
    public function select($ass=''){
        if($ass){
            $this->select = $ass;
        }else{
            $this->error = 1105;
        }

    }
    //检查session的
    protected function isSession(){
        if(!isset($_SESSION)){
            session_start();
        }
    }
    //获取一条数据
    public function getOne($table){
        $this->_Testing($table);
        if($this->where){
            $this->sql = sprintf('select %s from %s where %s',$this->select,$this->table,$this->where);
            return $this->_go(1);
        }else{
            $this->sql = sprintf('select %s from %s',$this->select,$this->table);
            return $this->_go(1);
        }
    }
    //处理传入的表名
    protected function _Testing($table){
        $table = quotemeta($table);
        $nowTable = strstr($table,'\\',true)?strstr($table,'\\',true):$table;
        //var_dump($nowTable);
        $this->table = $nowTable;
    }

    //执行查询语句并反馈
    protected function _go($a){
        //pdo类预处理sql语气
        $pdo = DB::pdo()->prepare($this->sql);
        $this->_key();
        switch ($a){
            case 1:
            if($pdo->execute()){
                return $pdo->fetch();
            }else{
                $this->error = 1101;
                return $this->getError();
            }break;
            case 2:
            if($pdo->execute()){
                return $pdo->fetchAll();
            }else{
                $this->error = 1101;
                return $this->getError();
            }break;
            case 3:
                if($pdo->execute()){
                    return $this->getError();
                }else{
                    $this->error = 1101;
                    return $this->getError();
                }break;
            default: $this->error = 1100;
                return $this->getError();
        }

    }
    //查询执行错误的sql语句
    public function getSQL(){
        return $this->sql;
    }
    public function __get($name)
    {
        return "请不要随便获取我的信息";
        // TODO: Implement __get() method.
    }
    //附加条件
    public function where($key,$val){
        if($this->where){
            $this->where .= " and ".$key." = '".$val."' ";
        }else{
            $this->where = "".$key." = '".$val."' ";
        }
    }
    //表的内连接
    public function whereT($key,$val){
        if($this->where){
            $this->where .= " and ".$key." = ".$val." ";
        }else{
            $this->where = "".$key." = ".$val." ";
        }
    }
    //执行将数组转换为字符串
    protected function _implode($arr,$a){
        if($a==1){
            if(@!is_array($arr[0])){
                $keys=[];
                $vals=[];
                foreach($arr as $key => $val){
                    $keys[] = $key;
                    $vals[] = "'".$val."'";
                }
                $this->key   = implode(',',$keys);
                $this->value = implode(',',$vals);
            }else{
                $this->error=1102;      //暂时不能处理多维数组
            }
        }elseif($a==2){
            if(@!is_array($arr[0])){
                $kk = [];
                foreach($arr as $key => $val){
                    $kk[] = $key." = '".$val."'";
                }
                $this->setVal = implode(',',$kk);
            }else{
                $this->error=1102;      //暂时不能处理多维数组
            }
        }
    }
    //执行删除语句并反馈
    public function delete($table){
        $this->_Testing($table);
        if($this->where&&$this->table){
            $this->sql = sprintf('delete from %s where %s ',$this->table,$this->where);
            return $this->_go(3);
        }else{
            if($this->error){
                return $this->getError();
            }else{
                $this->error = 1103; //条件不足
                return $this->getError();
            }
        }
    }
    //执行添加语句
    /*
     * $value = array(
     *      'id'=>'2',
     *      'name'=>'张三'
     * )
     * */
    public function insert($table,$value=array()){
        $this->_Testing($table);
        $this->_implode($value,1);
        if($this->key && $this->value && $this->table){
            $this->sql = sprintf('insert into %s (%s) VALUES (%s) ',$this->table,$this->key,$this->value);
            return $this->_go(3);
        }else{
            if($this->error){
                return $this->getError();
            }else{
                $this->error = 1103; //条件不足
                return $this->getError();
            }
        }
    }
    //执行修改语句
    /*
    * $value = array(
    *      'id'=>'2',
    *      'name'=>'张三'
    * )
    * */
    public function update($table,$value=array()){
        $this->_Testing($table);
        $this->_implode($value,2);
        if($this->setVal && $this->where && $this->table){
            $this->sql = sprintf('update %s set %s where %s',$this->table,$this->setVal,$this->where);
            return $this->_go(3);
        }else{
            if($this->error){
                return $this->getError();
            }else{
                $this->error = 1103; //条件不足
                return $this->getError();
            }
        }
    }
    //错误编码
    protected function getError(){
        $str = '';
        switch ($this->error) {
            case 1101: $str .= '语句执行失败,请输入我可以认识的语句';break;
            case 1102: $str .= '暂时不能处理多维数组';break;
            case 1103: $str .= '条件不足';break;
            case 1104: $str .= '请不要偷取密码';break;
            case 1105: $str .= '未给明查询内容';break;
            case 0   : $str  =  true;break;
            default: $str   .= '未知错误';
        }
        return $str;
    }
}