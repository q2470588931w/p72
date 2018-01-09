<?php

/**
 * Created by PhpStorm.
 * User: XXL
 * Date: 2018/1/6
 * Time: 9:33
 */
namespace app\home\Validate;

use think\Validate;

class Test extends Validate
{
    protected $rule = [
        'email' => 'email',
        'name'  => 'require|max:20',
        'pass'  => 'password:a19941001s',
    ];
    protected $message = [
        'email' => '邮箱格式错误'
    ];
    protected function password($val,$rule,$data)
    {
        return $rule == $val ?true:'名称不符合';
    }
}