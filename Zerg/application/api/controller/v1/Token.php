<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/25/0025
 * Time: 20:24
 */

namespace app\api\controller\v1;


use app\api\validate\TokenGet;
use app\api\service\Token as TokenService;
class Token
{
    public function getToken($code=''){
        (new TokenGet())->gocheck();
        return json((new TokenService($code))->get());
        
    }
}