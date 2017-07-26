<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/26/0026
 * Time: 21:29
 */

namespace app\lib\exception;


class WeixinException extends BaseException
{
    public $code=404;
    public $msg='微信错误，未定位异常';
    public $errorCode=10000;
}