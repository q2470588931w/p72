<?php

/**
 * Created by PhpStorm.
 * User: xxl
 * Date: 2018/1/2
 * Time: 17:24
 */
namespace app\admin\Controller;

use think\Controller;

class Index extends Controller
{
    public function index(){
        return $this->display();
    }
}