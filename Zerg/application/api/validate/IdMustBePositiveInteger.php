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
    protected function isPositiveInteger($value,$rule='',$data='',$field=''){
       if(is_numeric($value)&&is_int($value+0)&&($value+0)>0){
       		return true;
       }
       else{
       		return $field.'必须是正整数';
       }
    }
}