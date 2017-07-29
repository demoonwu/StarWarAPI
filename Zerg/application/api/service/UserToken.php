<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/25/0025
 * Time: 21:22
 */

namespace app\api\service;


use app\api\model\User;
use app\lib\exception\TokenException;
use app\lib\exception\WeixinException;
use app\api\model\User as UserModel;

class UserToken extends BaseToken
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
    
    /**
     * @return mixed
     */
    public function get(){
        //这里使用了自定义的curl_get方法
        $result=curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result,true);
        
        if(empty($wxResult)){
            throw new Exception('获取session_key及openID异常，服务器内部错误');
        }else{
            $loginFail=array_key_exists('errcode',$wxResult);
            if($loginFail){
                $this->processLoginError($wxResult);
            }else{
                $token = $this -> grantToken($wxResult);
                return $token;
            }
        }
    }
    
    /**
     * @param $wxResult
     */
    private function grantToken($wxResult){
//        拿到openid
//        查看数据库，如果openid是否存在，
//        已经存在，不做任何处理，如果不存在那么新增加一条user记录
//        生成令牌，准备缓存数据
//        存入缓存
//        把令牌返回
        $openid = $wxResult['openid'];
//        在这里调用model查询数据库里面是否有这个用户
        $user = UserModel::getUserByOpenId($openid);
        if($user){
            $uid = $user->id;
        }else{
            $uid = $this->createNewUser($openid);
        }
//        下面准备被缓存的数据value
        $cachedValue = $this->prepareCachedValue($wxResult, $uid);
//        下面准备被缓存的数据的key(就是Token令牌)
//        从baseToken继承获得一个32位的Token令牌,这里和老师的写法不太一样，因为对业务的逻辑理解不一样
        $key = self::generaToken();
        $token = $this->saveToCached($key,$cachedValue);
        return $token;
    }
    private function saveToCached($key,$cachedValue){
        $key = $key;
        $cachedValue=json_encode($cachedValue);
        $expire_in=config("setting.token_expire_in");
//      下面调用TP5自带的缓存方法
        $request = cache($key,$cachedValue,$expire_in);
        if (!$request){
            throw new TokenException([
                'msg'=>'服务器缓存异常',
                'errorCode'=>10005
            ]);
        }
        return $key;
    }
    
    /**
     * @param $wxResult
     * @param $uid
     * @return mixed $cachedValue
     */
    private function prepareCachedValue($wxResult,$uid){
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] = 16;#设置令牌的作用域
        return $cachedValue;
    }
    
    /**
     * @param $openid
     * @return mixed
     */
    private function createNewUser($openid){
//      正式部署时候可以用这个来更新uid的主键值
//      ALTER TABLE `user` AUTO_INCREMENT = 0;
        return UserModel::create([
            "openid"=>$openid
        ])->id;

    }
    
    private function processLoginError($wxResult){
        throw new WeixinException([
            'errorCode'=>$wxResult['errcode'],
            'msg'=>$wxResult['errmsg']
        ]);
    }
}