<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-17 17:13:40
 * @版本: $Id$
 */
namespace app\api\validate;
use think\Validate;
use think\Request;
use think\Exception;
use app\lib\exception\ParameterException;
class BaseValidate extends Validate {
    // 获取http传入的参数
    // 对这些参数做校验
    public function gocheck(){
       $request=Request::instance();
       $params=$request->param();

       $result=$this->batch()->check($params);
       if(!$result){
          // 重构异常，将msg作为一个变量传入
          $ex=new ParameterException([
            'msg' =>$this->error 
            ]);
       		// $ex->msg=$this->error;
       		throw $ex;
       }else{
       		return true;
       }
    }
}