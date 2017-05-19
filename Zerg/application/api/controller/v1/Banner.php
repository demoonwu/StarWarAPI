<?php
/**
 * 创建banner接口
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-05-15 16:21:45
 * @版本: $Id$
 */
namespace app\api\controller\v1;
use think\Request;
use app\api\validate\IdMustBePositiveInteger;
use app\api\model\Banner as BannerModel;

class Banner{
    
    function getBanner($id){
    	(new IdMustBePositiveInteger())->gocheck();
    	try {
    		$banner=BannerModel::getBannerById($id);    	
    	} catch (Exception $ex) {
    		$err=[
    			'error_code'=>10001,
    			'msg'=>$ex->getMessage()
    		];
    		return json($err,400);
    	}
       //echo "路由通过";
    	return json($banner);
    }

    function tryNewValidate(){
    	$data= Request::instance()->param();
    	//var_dump($data);
    	// IdMustBePositiveInteger::interface()->gocheck();
    	(new IdMustBePositiveInteger())->gocheck();
    	echo "新的验证层";
    	return json();
    }
}