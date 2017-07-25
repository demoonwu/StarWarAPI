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
use app\lib\exception\ThemeMissException;
use app\api\validate\IdMustBePositiveInteger;
use app\api\model\Theme as ThemeModel;
class Theme{
    /**
     * @param string $ids
     * @url /theme?ids=id1,id2....
     * @return \think\response\Json 一组theme模型
     * @throws SimpleListMissException
     */
    public function getSimpleList($ids=''){
        (new IdCollection())->gocheck();
        $ids=explode(',',$ids);
        //$result=ThemeModel::with('topicImg,headImg')->select($ids);
        $result=ThemeModel::getSimpleListByIds($ids);
        if ($result->isEmpty()) {
            throw new SimpleListMissException();
        }
       return json($result);
    }

    public function getComplexOne($id){
        (new IdMustBePositiveInteger())->gocheck();
        $result=ThemeModel:: getThemeWithProducts($id);
        if ($result->isEmpty()) {
            throw new ThemeMissException();
        }
        return json($result);
    }
}