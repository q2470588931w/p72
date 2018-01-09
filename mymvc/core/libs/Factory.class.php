<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 15:40
 *
 * 项目大工厂类
 */
class Factory
{
    /*
     * 生产模型的单例对象
     *
     * */
    public static function newOB($name){
        //储存已经实例化好的模型对象的列表，下表模型名，值为对象
        static $model_list = array();
       /* //首字母大写
        $name = ucfirst($name);*/
        //判断当前模型是否已经实例化
        if(!isset($model_list[$name])){
            //没有实例化
            $model_list[$name] = new $name;//可变标志符，可变类
        }
        return $model_list[$name];
    }
}