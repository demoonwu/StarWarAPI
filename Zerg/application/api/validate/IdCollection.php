<?php
/**
 * 自定义的异常处理类
 @用于处理Theme中传递来的值必须为以,分隔的字符串 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-08 18:14:22
 * @版本: $Id$
 */
namespace app\api\validate;
class IdCollection extends BaseValidate {
    protected $rule=[
    	'ids'=>'require|AllIsPositiveInteger'
    ];
    // 这个是TP5自定义的$message变量，专门用来传递验证不通过的消息的
    protected $message=[
      'ids'=>'ids参数必须是以，分隔的多个正整数'
    ];

}