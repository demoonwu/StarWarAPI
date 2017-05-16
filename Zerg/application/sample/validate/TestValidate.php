<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-15 22:17:16
 * @版本: $Id$
 */
namespace app\sample\validate;
use think\Validate;
class TestValidate extends Validate {
	protected  $rule=[
		'name' =>'require|max:10' ,
		'address'=>'require',
		'email' =>'email' 
		];
}