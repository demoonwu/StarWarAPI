<?php

namespace app\api\model;

use think\Model;

class Product extends BaseModel
{
    protected $hidden=['pivot','from','main_img_id','category_id','create_time','update_time','delete_time'];
    // 定义图片路径的读取器
    public function getMainImgUrlAttr($value,$data){
		return $this->prefixImgUrl($value,$data);
	}
	public static function getMostRecent($count){
		$products=self::limit($count)->order('create_time desc')->select();
		 return $products;
	}
}
