<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 10:56
 */
class AuthModel extends Model
{
    public function change($id,$gid){
        $this->where('id',$id);
        $arr = array(
            'gid' => $gid
        );
        return $this->update('user_login',$arr);
    }
    public function index(){
        $this->whereT('allow.jID','juris.jID');
        return $this->get('allow,juris');
    }
    public function getgrade(){
        return $this->get('grade');
    }
    public function getjuris(){
        $this->select('name');
        return $this->get('juris');
    }

    public function getMyGrade($gName){
        $this->where('gID',$gName);
        $this->select('name');
        return $this->index();
    }
    public function changeAuth($arr,$gID){
        $this->dropGid($gID);
        $str = true;
        foreach($arr as $val){
            $jID=$this->jID($val);
            $narr = array(
                'jID' => $jID['jID'],
                'gID' => $gID
            );
            $ret=$this->insert('allow',$narr);
            if(!$ret){
                $str .= $ret;
            }
        }
        return $str;
    }
    private function dropGid($gID){
        $this->where('gID',$gID);
        $this->delete('allow');
    }
    private function jID($name){
        $this->where('name',$name);
        $this->select('jID');
        return $this->getOne('juris');
    }
}