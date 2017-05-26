<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::rule('hello','sample/Test/hello');
Route::rule('tryValidate','sample/Test/tryValidate');
Route::rule('getInfo','sample/Test/getInfo');
Route::post('getvar/:id','sample/Test/getvar');
Route::get('getBanner/:id','api/v1.Banner/getBanner');
Route::rule('tryNewValidate/:id','api/v1.Banner/tryNewValidate');
