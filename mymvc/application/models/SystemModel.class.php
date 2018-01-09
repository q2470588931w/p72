<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/20
 * Time: 18:32
 */
class SystemModel extends Model
{
    public function index(){
        return $this->get('system');
    }
    public function getFriend(){
        return $this->get('friendship');
    }
    //添加栏目
    public function Systembar($values){
        if(is_array($values)){
            $str = true;
            foreach ($values as $val){
                $ret=$this->Systembar($val);
                if($ret!=true){
                    $str .= $ret;
                }
            }
            return $str;
        }else{
            $arr = array(
                'sbName' => $values
            );
            $this->insert('system_bar',$arr);
        }
    }
    //获取所以栏目
    public function getSystembar(){
        return $this->get('system_bar');
    }
    //更改栏目值
    public function changeSystem($sbID,$sVal){
        $this->where('sbID',$sbID);
        $hade = $this->getOne('system');
        if(is_array($hade)){
            $this->where('sbID',$sbID);
            $arr=array(
                'sVal' => $sVal
            );
            return $this->update('system',$arr);
        }else{
            $arr=array(
                'sbID' => $sbID,
                'sVal' => $sVal
            );
            return $this->insert('system',$arr);
        }

    }
    //改栏目名
    public function changes($sbID,$sVal){
            $this->where('sbID',$sbID);
            $arr=array(
                'sbName' => $sVal
            );
            return $this->update('system_bar',$arr);
    }
    public function System($sbname, $sVal){
        $this->Systembar($sbname);
        $this->where('sbName',$sbname);
        $ret=$this->getOne('system_bar');
        return $this->changeSystem($ret['sbID'],$sVal);
    }
    //都删除
    public function dropAll($sbID){
        $this->where('sbID',$sbID);
        $ret=$this->delete('system_bar');
        if($ret!=true){
            return $ret;
        }
        $this->where('sbID',$sbID);
        $ret=$this->delete('system');
        if($ret!=true){
            return $ret;
        }
        return $ret;
    }
    //连接
    public function friendship($name,$url){
        $arr = array(
            'url'=>$url,
            'name'=>$name
        );
        return $this->insert('friendship',$arr);
    }
    //删除连接
    public function dropfriendship($id){
        $this->where('id',$id);
        return $this->delete('friendship');
    }
    //修改
    public function changefriendship($id,$name,$url){
        $this->where('id',$id);
        $arr=array(
            'name' => $name,
            'url'  => $url
        );
        return $this->update('friendship',$arr);
    }
}