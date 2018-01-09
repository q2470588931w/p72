<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/19
 * Time: 14:12
 */
class AllowModel extends Model
{
    //查找权限
    public function getallow($gID){
        //表联合的条件
        $this->select('jName');
        $this->whereT('allow.jID','juris.jID');
        $this->where('gID',$gID);
        //return $this->get('allow,juris');
        $arr = $this->get('allow,juris');
        //print_r($arr);exit;
        $nrr = [];
        foreach ($arr as $val){
            //echo $val['jName'];exit;
            $nrr[] = $val['jName'];
        }
        return $nrr;
    }
}