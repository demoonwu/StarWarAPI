<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-19 15:06:08
 * @版本: $Id$
 */
namespace app\lib\exception;
use think\Exception;
use think\Request;
use think\exception\Handle;
class ExceptionHandler extends Handle {
	private $code=400;
	private $msg="参数错误";
	private $errorCode=10000;

	public function render(Exception $ex){
		if ($ex instanceof BaseException) {
			$this->code=$ex->code;
			$this->msg=$ex->msg;
			$this->errorCode=$ex->errorCode;
		} else {
			$this->code=500;//自定义的500
			$this->msg="服务器内部错误，外部无法读取";
			$this->errorCode=999;
		}
		$request=Request::instance();

		$result=[
			'msg'=>$this->msg,
			'error_code'=>$this->errorCode,
			'request_url'=>$request->url()
		];

	return json($result,$this->code);
	//return json("123");

	}
}