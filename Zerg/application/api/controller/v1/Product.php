<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-09 21:14:36
 * @版本: $Id$
 */
namespace app\api\controller\v1;
use app\api\validate\CountIsPositiveInteger;
use app\api\validate\IdMustBePositiveInteger;
use app\api\model\Product as ProductModel;
use app\lib\exception\ProductException;
class Product {
    //这个接口用于返回最近入库的新品，上限为15条
    /**
     * @param int $count
     * @return \think\response\Json
     * @throws ProductException
     */
    public function getRecent($count=15){
       (new CountIsPositiveInteger())->gocheck();
       //在config里面将返回的$result作为collection对象返回，调用hidden方法对summary字段进行临时隐藏
       $result=ProductModel::getMostRecent($count)->hidden(['summary']);
       if ($result->isEmpty()) {
           throw new ProductException;
       }
       return json($result);
    }

    public function getAllInCategory($id){
        (new IdMustBePositiveInteger)->gocheck();
        $products=ProductModel::getProductsByCategoryId($id);
        if ($products->isEmpty()) {
            throw new ProductException();
            
        }
        return json($products);

    }
}