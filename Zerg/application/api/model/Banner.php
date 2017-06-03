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
use think\Model;

class Banner extends Model{
    public static function getBannerById($id){
       /* $result=Db::query(
            'select * from banner_item where banner_id=?',[$id]);
        return $result;*/
        //删除了上述的使用原生sql的，转而使用query查询器
       /* $result =Db::table('banner_item')->where('banner_id','=',$id)->find();*/
       // 数组法因为安全性问题官方不推荐，下面使用闭包法来查询
        $result=Db::table('banner_item')->where(function ($query) use ($id){
            $query->where('banner_id','=',$id);
        })->fetchSql()->select();//fetchSql返回sql具体语句而不执行
        return $result;
    }
}