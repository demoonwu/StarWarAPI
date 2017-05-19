<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-19 14:54:51
 * @版本: $Id$
 */
namespace app\lib\exception;
use think\Exception;
class BaseException extends Exception{
	//因为主要是内部通信，为了省事没做封装
   public $code=400;
   public $msg="参数错误";
   public $errorCode=10000;
}