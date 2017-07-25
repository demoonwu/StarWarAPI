<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/25/0025
 * Time: 20:38
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule=[
//        ['code','require|isNotEmpty','code必须传入|code不能为空']
        ['code','require|isNotEmpty','code必须传入|code不能为空']
//        'code'=>'require|isNotEmpty'
    ];
//    protected $message=[
//        'code'=>'code必须传入|code不能为空'
//    ];
    
}