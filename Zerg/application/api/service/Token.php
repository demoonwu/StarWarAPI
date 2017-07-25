<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/25/0025
 * Time: 21:22
 */

namespace app\api\service;


use think\Exception;

class Token
{
    /**
     * @param $id
     * @return int
     */
    protected $code;
    protected $wxAppId;
    protected $wxAppSecret;
    protected $wxLoginUrl;
    
    public function __construct($code)
    {
        $this->code = $code;
        $this->wxAppId = config('wxsetting.app_id');
        $this->wxAppSecret = config('wxsetting.app_secret');
        $this->wxLoginUrl = sprintf(config('wxsetting.login_url'),$this->wxAppId,$this->wxAppSecret,$this->code);
    }
    
    public function get(){
        $result=curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result,true);
        
//        if(empty($wxResult)){
//            throw new Exception('获取session_key及openID异常，微信内部错误')；
//        }else{
//            $loginFail=array_key_exists('errcode',$wxResult);
//            if($loginFail){
//
//            }else
//        }
    }
    
//    private function
}