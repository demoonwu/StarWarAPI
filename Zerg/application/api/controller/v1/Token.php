<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/25/0025
 * Time: 20:24
 */

namespace app\api\controller\v1;


use app\api\validate\TokenValidate;
use app\api\service\UserToken as TokenService;
class Token
{
    public function getToken($code=''){
        (new TokenValidate())->gocheck();
        $token=(new TokenService($code))->get();
        return json([
            'token'=>$token
        ]);
        
    }
}