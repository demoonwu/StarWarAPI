<?php
/**
 * 该验证器用在Product中，使得Count必须为1到15间的正整数
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-09 21:19:18
 * @版本: $Id$
 */
namespace app\api\validate;
class CountIsPositiveInteger extends BaseValidate {
    protected $rule=[
    	'count'=>'isPositiveInteger|between:1,15'
    ];
    protected $message=[
      'count'=>'count参数必须是介于1到15之间的正整数'
    ];
}