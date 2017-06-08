<?php
/**
 *所有模型的基类，一些通用方法会写在这里 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.c
 om)
 * @创建日期:2017-06-08 17:37:16
 * @版本: $Id$
 */
namespace app\api\model;
use think\Model;
class BaseModel extends Model {
    
    public function prefixImgUrl($value,$data){
       $finalUrl=$value;
       // 如果确定路径来源于本地
       if ($data['from']==1) {
       	$finalUrl=config('setting.img_prefix').$finalUrl;
       };
       return $finalUrl;
    }
}