<?php

namespace app\api\model;

use think\Model;

class Image extends Model
{
	protected $hidden=['id','from','update_time','delete_time'];
	public function getUrlAttr($value,$date){
		if($date['from']==1){
			$value=config('setting.img_prefix').$value;
		};
		return $value;
	}
}
