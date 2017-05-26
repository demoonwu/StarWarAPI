<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-26 10:17:05
 * @版本: $Id$
 */
namespace app\lib\exception;
class ParameterException extends BaseException {
	public $code=400;
	public $msg='参数错误';
	public $errorCode=10000;


}