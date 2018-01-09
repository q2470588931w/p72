<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/24
 * Time: 14:19
 */
class IndexModel extends Model
{
    public function getsystem(){
        $this->select('sbName,sVal');
        $this->whereT('system.sbID','system_bar.sbID');
        $arr = $this->get('system,system_bar');
        return $this->takesystem($arr);
    }
    //分配键值、键名
    protected function takesystem($arr){
        $narr=[];
        foreach($arr as $val){
            $narr[$val['sbName']]=$val['sVal'];
        }
        return $narr;
    }
    //拿到友情连接
    public function getfriendship(){
        return $this->get('friendship');
    }
    //栏目
    public function getnavigation(){
       $arr = $this->get('project');
        return $this->takena($arr);
    }
    //排列栏目
    private function takena($a,$fid=0,$jb=1){
        static  $vas = array();
        foreach($a as $val){
            if($val['fID']==$fid){
                $val['fID'] = $jb;
                $vas[] = $val;
                $this->takena($a,$val['ID'],$jb+1);
            }
        }
        return $vas;
    }
    //人物
    public function getmen(){
        $this->whereT('men.cID','camp.cID');
        return $this->get('men,camp');

    }
    //
    public function geturl($nID){
        $this->where('nID',$nID);
        $this->select('nUrl');
        return $this->getOne('news');
    }

}