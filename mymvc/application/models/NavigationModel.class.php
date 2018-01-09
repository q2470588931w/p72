<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/18
 * Time: 16:19
 */
class NavigationModel extends Model
{
    //添加栏目数据  没有添加栏目地址
    public function addNavigation($arr){
        return $this->insert('project',$arr);
    }
    //获取所以导航栏
    public function getNavigation(){
        $rest =  $this->get('project');
        return $this->takena($rest);
    }
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
    //logo图片上传
    public function logo($file){
        $load=Factory::newOB('Uploadfile');
        $load->set("path",NOW_PATH.'static/Navigation');
        $load->set("israndname",true);
        //$this->getSQL();echo"<hr>";
        if($load->upload($file)){
            $url=$load->getFileName();
            $ret = $this->intoLogo($url);
            if($ret){
                return $url;
            } else{
                return  $ret;
            }

            //var_dump($arr);exit;
        }else{
            return $load->getErrorMsg();
        }
    }
    //logo浏览
    public function getlogo(){
        return $this->get('logo');
    }
    //资料保存替换
    protected function intoLogo($url){
        //$this->select('url');
        $nowurl = $this->getOne('logo');
        //echo $this->getSQL();
        //var_dump($nowurl);exit;
        $arr=array(
            'url'=>$url
        );
        if(is_array($nowurl)){
            unlink(NOW_PATH.'static/Navigation/'.$nowurl['url']);
            $this->where('id',1);
            return $this->update('logo',$arr);
        }else{
            return $this->insert('logo',$arr);
        }
    }
    //删除栏目
    public function dropNavigation($id){
        $this->where('fID',$id);
        $rest = $this->get('project');
        //var_dump($rest!=array());exit;
        if($rest!=array()&&is_array($rest)){
            $abc = true;
            foreach($rest as $val){
                 $tes = $this->dropNavigation($val['ID']);
                if($tes!=true){
                    $abc .= $tes;
                }
            }
            return $abc;
        }else{
            $this->where('ID',$id);
            return $this->delete('project');
        }
    }
    //更改信息
    public function changeurl($id,$url){
        $this->where('ID',$id);
        $arr = array(
            'pUrl'=>$url
        );
        return $this->update('project',$arr);
    }
}