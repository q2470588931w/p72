<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/7
 * Time: 14:46
 */
class DB
{
    //创建一个静态的属性来存储pdo这个对象
    protected static $pdo = null;
    public static function PDO(){
        //判断，如果属性中有pdo对象 则直接反馈
        if(self::$pdo!=null){
            return self::$pdo;
        }
        //拼装pdo对象的第一个参数
        $dns = sprintf('mysql:host=%s;dbname=%s',DB_HOST,DB_NAME);
        //拼接 一个具体驱动的连接选项的键=>值数组  就是最后一个参数
        //PDO::__construct ( string $dsn [, string $username [, string $password [, array $driver_options ]]] )
        $option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        //实例化pdo对象，并返回
        return self::$pdo = new PDO($dns,DB_USER,DB_PASS,$option);
    }
}