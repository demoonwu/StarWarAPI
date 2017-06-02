<?php
/**
 * Banner的Model层
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-19 14:24:21
 * @版本: $Id$
 */
namespace  app\api\model;

use think\Db;

class Banner{
    
    public static function getBannerById($id){
       /* $result=Db::query(
            'select * from banner_item where banner_id=?',[$id]);
        return $result;*/
        //删除了上述的使用原生sql的，转而使用query查询器
        $result =Db::table('banner_item')->where('banner_id','=',$id)->find();
        return $result;
    }
}