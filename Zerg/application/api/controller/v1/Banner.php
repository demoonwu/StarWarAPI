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
use app\lib\exception\BannerMissException;
use think\Exception;
use think\Log;

class Banner{
    
    function getBanner($id){
    	(new IdMustBePositiveInteger())->gocheck();
    	// try {
    	// 	$banner=BannerModel::getBannerById($id);    	
    	// } catch (Exception $ex) {
    	// 	$err=[
    	// 		'error_code'=>10001,
    	// 		'msg'=>$ex->getMessage()
    	// 	];
    	// 	return json($err,400);
    	// }
    	$banner=BannerModel::getBannerById($id);
    	if(!$banner){
    		//Log::record('我是一个大胆的尝试', 'error');
    		//log('error');
            //大胆尝试是自己写的，可以去掉就正常使用了；
    		throw new BannerMissException(['msg'=>'我是一个大胆的尝试']);
    		// throw new Exception();
    	}

       //echo "路由通过";
    	return json($banner,200);
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