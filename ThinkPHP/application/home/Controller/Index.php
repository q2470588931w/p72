<?php

/**
 * Created by PhpStorm.
 * User: xxl
 * Date: 2018/1/2
 * Time: 16:42
 */
namespace app\home\Controller;

use think\Controller;
use think\Loader;

class Index extends Controller
{
    //商城主页
    public function Index(){
        return $this->fetch();
    }
    //验证器
    public function val(){
        //$validate = validate('Test');
        $validate = Loader::validate('Test');
        $data     = [
            'email' => '123qq.com',
            'name' => 'q774084941wasdfsdfsdsafdsadf',
            'pass' => 'a19941001',
        ];
        if($validate->batch()->check($data)){
            echo 'ok';
        }else{
            dump($validate->getError());
        };
    }
}