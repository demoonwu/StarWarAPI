<?php
/**
 * 
 * @作者: Demoonwu 
 * @电子邮箱:(Demoonwu@foxmail.com)
 * @创建日期:2017-06-08 17:53:20
 * @版本: $Id$
 */
namespace app\api\controller\v1;
use app\api\validate\IdCollection;
use app\lib\exception\SimpleListMissException;
use app\api\model\Theme as ThemeModel;
class Theme{
    /*
	@url /theme?ids=id1,id2....
	@return 一组theme模型
    */

    public function getSimpleList($ids=''){
    	(new IdCollection())->gocheck();
    	$ids=explode(',',$ids);
    	//$result=ThemeModel::with('topicImg,headImg')->select($ids);
    	$result=ThemeModel::getSimpleListByIds($ids);
    	if (!$result) {
    		throw new SimpleListMissException();
    	}
       return json($result);
    }
}