<?php
/**
 * Created by PhpStorm.
 * User: XXL
 * Date: 2018/1/6
 * Time: 10:39
 */

namespace app\home\Validate;


use think\Validate;

class User extends Validate
{
    protected $rule = [
        'email'  =>  'require|email',
        'phone'  =>  "['require|max:11|/^1[3-8]{1}[0-9]{9}$/','请输入手机号码|手机号码最多不能超过11个位|手机号码格式不正确']",
        'password' => 'require|max:25',
    ];
    protected $message = [
      'email.require'    => '邮箱不能为空',
      'email.email'      => '邮箱格式错误',
      'phone.require'    => '电话不能为空',
      'phone.max'        => '电话超过了11位',
      'password.require' => '密码不能为空',
      'password.max'     => '密码不能超过25位',
    ];
    protected $scene = [
        'email' => ['email','password'],
        'phone' => ['phone','password'],
    ];

}