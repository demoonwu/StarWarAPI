<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-17 17:41:03
 * @版本: $Id$
 */
namespace app\api\validate;
// use think\Validate;  //这一行可以注释掉因为在basevalidate中已经使用了命名空间
class IdMustBePositiveInteger extends BaseValidate {
    protected $rule=[
    	'id'=>'require|isPositiveInteger'
    ];
    // 这个是TP5自定义的$message变量，专门用来传递验证不通过的消息的
    protected $message=[
      'id'=>'id必须是正整数'
    ];
   
}