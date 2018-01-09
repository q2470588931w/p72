<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/5
 * Time: 14:50
 */
namespace app\home\Model;

use app\home\Controller\Begin;
use think\Model;

class User extends Model
{
    public function register($data){
        if(isset($data['email'])){
            $id = $this->insert($data,false,true);
           // return $id;
            $mail = new Begin();
            return $mail->mail($data['email'],$id);
        }elseif(isset($data['phone'])){
            return $this->insert($data);
        }else{
            return '数据格式不符合';
        }
    }
}