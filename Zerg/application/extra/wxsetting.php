<?php
/**
 * Created by PhpStorm.
 * User: DemoonWu-Whaley
 * Date: 2017/7/24/0024
 * Time: 20:38
 */

return[
    'app_id'=>'wxb238b631cbd498dc',
    'app_secret'=>'1684126403b6823a88d1594b60b1003b',
//    直接回车，php 以分号结束语句
//   微信官方给的地址，我们要拼接一下 'login_url'=>'https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code',
    'login_url'=>'https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code'

];