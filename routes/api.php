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
    Route::get    ('/operation_log'                                       , 'OperationLogController@index')                       ->name('operation_log.index');       #获取数据                                                 #
    Route::post   ('/operation_log'                                       , 'OperationLogController@store')                       ->name('operation_log.store');       #创建                                                  #
    Route::put    ('/operation_log/{permission}'                          , 'OperationLogController@update')                      ->name('operation_log.update');      #更新
    Route::delete ('/operation_log/{permission}'                          , 'OperationLogController@destroy')                     ->name('operation_log.destroy');     #删除


});
