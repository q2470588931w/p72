<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/20
 * Time: 15:40
 */
class UserModel extends Model
{
    public function loginUse($a,$b){
        $this->select('loginTime,loginIP');
        $one = $this->getOne($a);
        $this->isSession();
        $_SESSION['loginTime']=$one['loginTime'];
        $_SESSION['loginIP']=$one['loginIP'];
        if(is_array($one)&&$one!=array()){
            $this->where('uID',1);
            return $this->update($a,$b);
        }else{
            return $this->insert($a,$b);
        }
    }
    public function getUser(){
       return $this->get('grade');
    }
    public function add($a){
        $arr = array(
            'gName' => $a
        );
        return $this->insert('grade',$arr);
    }
    public function drop($gID){
        $this->where('gID',$gID);
        return $this->delete('grade');
    }
    public function modify($ID,$name){
        $this->where('gID',$ID);
        $arr = array(
            'gName' => $name
        );
        return $this->update('grade',$arr);
    }
    public function getMen(){
        $this->whereT('user_login.gid','grade.gid');
        return $this->get('user_login,grade');
    }
    public function takeuser($arr){
        return $this->insert('user_login',$arr);
    }
    public function dropMen($id){
        $this->where('id',$id);
        return $this->delete('user_login');
    }
}