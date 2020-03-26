<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('api/admin/v1')->name('api.admin.v1.')->namespace('Api\Admin')->group(function() {
    Route::get    ('/operationg_logs'                                       , 'OperationgLogApiController@index')                       ->name('operationg_logs.index');       #获取数据                                                 #
    Route::post   ('/operationg_logs'                                       , 'OperationgLogApiController@store')                       ->name('operationg_logs.store');       #创建                                                  #
    Route::put    ('/operationg_logs/{operationg_log}'                      , 'OperationgLogApiController@update')                      ->name('operationg_logs.update');      #更新
    Route::delete ('/operationg_logs/{operationg_log}'                      , 'OperationgLogApiController@destroy')                     ->name('operationg_logs.destroy');     #删除


});
