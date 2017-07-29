<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/25/0025
 * Time: 21:20
 */

namespace app\api\model;


class User extends BaseModel
{
    
    protected $autoWriteTimestamp = true;
    public static function getUserByOpenId($openid){
        $user = self::where("openid","=",$openid)->find();
        return $user;
    }
}