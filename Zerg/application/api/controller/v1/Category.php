<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-09 23:23:20
 * @版本: $Id$
 */
namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;
class Category{
    
    public function getAllCategories(){
       $categories=CategoryModel::all([],'img');
       if ($categories->isEmpty()) {
       	throw new CategoryException();              
       }
       return json($categories);
    }
}