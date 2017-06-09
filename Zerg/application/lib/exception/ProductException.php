<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-09 21:41:44
 * @版本: $Id$
 */
namespace app\lib\exception;
class ProductException extends BaseException {
	public $code=404;
	public $msg='制定的商品不存在，请检查参数';
	public $errorCode=20000;


}