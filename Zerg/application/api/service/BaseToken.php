<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/29/0029
 * Time: 22:02
 */

namespace app\api\service;


class BaseToken
{
    /**
     * @return string
     */
    public static function generaToken(){
        $randChars=getRandChar(32);
//        'REQUEST_TIME_FLOAT'
//请求开始时的时间戳，微秒级别的精准度。 自 PHP 5.4.0 开始生效。
        $timeStamp=$_SERVER["REQUEST_TIME_FLOAT"];
        $salt=config("secure.token_salt");
        return md5($randChars.$timeStamp.$salt);
    }
}