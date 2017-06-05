<?php

namespace app\api\model;

use think\Model;

class bannerItem extends Model
{   
	// 设置隐藏字段 
	protected $hidden=['id','img_id','banner_id','update_time','delete_time'];

	// 根据model的外键查询主表image
    public function img(){
    	return $this->belongsTo('Image','img_id','id');		
	}
}
