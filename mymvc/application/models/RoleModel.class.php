<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/23
 * Time: 16:23
 */
class RoleModel extends Model
{
    //保存图片
    public function picture($file){
        $load = Factory::newOB('Uploadfile');
        $load->set("path",NOW_PATH.'static/role');
        $load->set("israndname",true);
        if($load->upload($file)){
            $arr = $load->getFileName();
            //var_dump($arr);exit;
            return $arr;
        }else{
            return $load->getErrorMsg();
        }
    }
    //保存阵营资料
    public function camp($arr){
        return $this->insert('camp',$arr);
    }
    //获取阵营资料
    public function getcamp(){
        return $this->get('camp');
    }
    //保存舰娘资料
    public function role($arr){
        return $this->insert('men',$arr);
    }
    //获取所以资料
    public function getall(){
        $this->whereT('camp.cID','men.cID');
        return $this->get('camp,men');
    }
    //改变
    public function change($cID,$arr){
        $this->where('cID',$cID);
        return $this->update('men',$arr);
    }
}