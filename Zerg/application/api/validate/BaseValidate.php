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
       		throw $ex;
       }else{
       		return true;
       }
    }
    //===============================================================================
    protected function isPositiveInteger($value,$rule='',$data='',$field=''){
       if(is_numeric($value)&&is_int($value+0)&&($value+0)>0){
          return true;
       }
       else{
          // @return这个自定义方法只能返回true或者false
          // return $field.'必须是正整数';
        return false;
       }
    }
    /*
    @输入values必须是以，分隔多个正整数的字符串
    */
    protected function AllIsPositiveInteger($value,$rule='',$data='',$field=''){
      $values=explode(',',$value);
        // 在这里做了判断，如果规定一个也行，去掉sizeof即可
      if(empty($values)||sizeof($values)==1){
        return false;
      }
      foreach ($values as $id) {
        if(!$this->isPositiveInteger($id)){
          return false;
        }
      }
      return true;
    }
    
    /**
     * 用于检测是否为空
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool
     */
    protected  function isNotEmpty($value,$rule='',$data='',$field=''){
//        进过测试，如果传入值为空，tp5的验证器根本无法走到这，无论你是否定义了require
//        所以这个验证器基本上没啥用，为了表示对老师的尊敬就不删了
        if(empty($value)){
            return false;
        }else {
            return true;
        }
    }
}