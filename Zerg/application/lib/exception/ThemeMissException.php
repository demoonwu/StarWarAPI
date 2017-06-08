<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-08 22:12:51
 * @版本: $Id$
 */
namespace app\lib\exception;
class ThemeMissException extends BaseException {
	public $code=404;
	public $msg='无法通过id找到对应的主题';
	public $errorCode=10000;

}