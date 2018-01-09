<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/20
 * Time: 16:40
 */
class UserPassModel extends Model
{
    public function getuser(){
        $this->isSession();
        $id=$_SESSION['id'];
        $this->where('id',$id);
        return $this->getOne('user_login');
    }
    public function modify($pass,$a){

        $this->isSession();
        $id=$_SESSION['id'];
        $this->where('id',$id);
        switch($a){
            case 2:
                $arr = array(
                    'pass' => md5($pass)
                );break;
            case 1:
                $arr = array(
                    'user' => $pass
                );break;
            default:return false;

        }
        return $this->update('user_login',$arr);

    }
}