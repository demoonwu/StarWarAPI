<?php

namespace app\api\model;

use think\Model;

class Image extends BaseModel
{
	protected $hidden=['id','from','update_time','delete_time'];
	public function getUrlAttr($value,$data){
		//将这个方法封装进公有类BaseModel
		// 注意getUrlAttr这个方法是TP5自动调用的
		return $this->prefixImgUrl($value,$data);
	}
}
