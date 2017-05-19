<?php
/**
 * Banner
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-19 15:02:52
 * @版本: $Id$
 */
namespace app\lib\exception;
class BannerMissException extends BaseException {
    
   public $code=404;
   public $msg="请求的Banner不存在";
   public $errorCode=40000;
}