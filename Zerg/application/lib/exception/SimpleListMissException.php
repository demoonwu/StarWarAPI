<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-08 21:35:51
 * @版本: $Id$
 */
namespace app\lib\exception;
class SimpleListMissException extends BaseException {
    
   public $code=404;
   public $msg="请求的主题不存在，请检查主题的ID";
   public $errorCode=30000;
}