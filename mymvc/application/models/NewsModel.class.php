<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/12/15
 * Time: 16:30
 */

class NewsModel extends Model
{
    public function getCarousel(){
        return $this->get('carousel');
    }
    //保存图片
    public function picture($file){
        $load = Factory::newOB('Uploadfile');
        $load->set("path",NOW_PATH.'static/news/Carousel');
        $load->set("israndname",true);
        if($load->upload($file)){
            $arr = $load->getFileName();
            //var_dump($arr);exit;
            return $this->Carousel($arr);
        }else{
            return $load->getErrorMsg();
        }
    }
    //轮播图资料
    protected function Carousel($val){
        if(is_array($val)){
            $arr=true;
            foreach ($val as $oll){
                $ret=$this->Carousel($oll);
                if(!$ret){
                    $arr .= $ret;
                }
            }
            return $arr;
        }else{
            $arr = array(
                'cUrl' => $val
            );
            return $this->insert('carousel',$arr);
        }
    }
    //保存新闻文档
    public function text($text,$title){
        $textAPP = NOW_PATH.'static/news/words/'.$title.'.txt';
        $ress=file_put_contents(iconv('utf-8','gbk',$textAPP),$text);
        if(!$ress){
            return '文档写入失败';
        }else{
            return array('static/news/words/'.$title.'.txt');
        }
    }
    //保存新闻所以信息到数据库
    public function intonews($arr){
        return $this->insert('news',$arr);
    }
    //获取所有性质
    public function getNathar(){
            return $this->get('new_nathar');
    }
    //删除性质
    public function dropNathar($naID){
        $this->where('naID',$naID);
        return $this->delete('new_nathar');
    }
    //添加性质
    public function addNathar($name){
        $arr = array(
            'naID'   => '',
            'nathar' => $name
        );
        return $this->insert('new_nathar',$arr);
    }
    //从数据库拿所以数据
    public function getAllNews(){
        $this->select('nID,nTitle,nTime,author,nathar');
        $this->whereT('news.naID','new_nathar.naID');
        $this->where('recycle_bin','1');
        return $this->get('news,new_nathar');
    }
    //删除数据进入数据库  回收站操作
    public function recycle_bin($ID){
        $this->where('nID',$ID);
        $arr = array(
            'recycle_bin' => 0
        );
        return $this->update('news',$arr);
    }
    //删除轮播图
    public function dropCarousel($id){
        $this->where('cID',$id);
        $this->select('cUrl');
        $curl=$this->getOne('carousel');
        $ret=$this->pict($curl);
        if($ret==true){
            $this->where('cID',$id);
            return $this->delete('carousel');
        }else{
           return $ret;
        }
    }
    //删除图片
    protected function pict($curl){
       return unlink(NOW_PATH.'static/news/Carousel'.$curl['cUrl']);
    }
    //修改轮播图
    public function changeCarousel($cID,$id){
        $this->where('cID',$cID);
        $arr = array(
            'corder' => $id
        );
        return $this->update('carousel',$arr);
    }
}