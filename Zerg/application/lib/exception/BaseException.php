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
	/*http状态码*/
   public $code=400;
   // 错误的具体信息
   public $msg="参数错误";
   // 自定义的错误码
   public $errorCode=10000;


   public function __construct($params=[]){
   	//如果没有参数传入，那么就不掉用构造方法
   	if (!is_array($params)) {
   		throw new Exception('异常的构造参数的必须为数组，请检查异常的类的定义');
   	}
   	if (array_key_exists('code', $params)) {
   		$this->code=$params['code'];
   	}
   	if (array_key_exists('msg', $params)) {
   		$this->msg=$params['msg'];
   	}
   	if (array_key_exists('errorCode', $params)) {
   		$this->errorCode=$params['errorCode'];
   	}




   }
}