<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/23
 * Time: 9:23
 */
class AdminModel extends Model
{
    //获取用户信息
    public function getuser(){
        $this->whereT('user.id','user_login.id');
        $this->whereT('user.gid','grade.gid');
        return $this->get('user,user_login,grade');
    }
}