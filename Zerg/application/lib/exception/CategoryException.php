<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-09 23:30:25
 * @版本: $Id$
 */
namespace app\lib\exception;
class CategoryException extends BaseException {
    
   public $code=404;
   public $msg="制定类目不存在，请检查参数";
   public $errorCode=50000;
}