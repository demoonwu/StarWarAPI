<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/29/0029
 * Time: 22:29
 */

namespace app\lib\exception;
class TokenException extends BaseException {
    public $code=401;
    public $msg="Token已经过期或者无效";
    public $errorCode=10001;
}