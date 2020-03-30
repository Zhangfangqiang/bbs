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

Route::prefix('/admin/v1')->name('api.admin.v1.')->namespace('Api\Admin')->group(function() {
    Route::get    ('/operationg_logs'                                       , 'OperationgLogApiController@index')                       ->name('operationg_logs.index');          #获取数据
    Route::post   ('/operationg_logs'                                       , 'OperationgLogApiController@store')                       ->name('operationg_logs.store');          #创建
    Route::put    ('/operationg_logs/{operationg_log}'                      , 'OperationgLogApiController@update')                      ->name('operationg_logs.update');         #更新
    Route::delete ('/operationg_logs/{operationg_log}'                      , 'OperationgLogApiController@destroy')                     ->name('operationg_logs.destroy');        #删除

    Route::get    ('/users'                                                 , 'UserApiController@index')                                ->name('users.index');                    #获取数据
    Route::post   ('/users'                                                 , 'UserApiController@store')                                ->name('users.store');                    #创建
    Route::put    ('/users/{operationg_log}'                                , 'UserApiController@update')                               ->name('users.update');                   #更新
    Route::delete ('/users/{operationg_log}'                                , 'UserApiController@destroy')                              ->name('users.destroy');                  #删除

    Route::get    ('/categories'                                            , 'CategoryApiController@index')                            ->name('categories.index');               #获取数据
    Route::post   ('/categories'                                            , 'CategoryApiController@store')                            ->name('categories.store');               #创建
    Route::put    ('/categories/{operationg_log}'                           , 'CategoryApiController@update')                           ->name('categories.update');              #更新
    Route::delete ('/categories/{operationg_log}'                           , 'CategoryApiController@destroy')                          ->name('categories.destroy');             #删除

    Route::get    ('/upload_records'                                        , 'UploadRecordApiController@index')                        ->name('upload_records.index');           #获取数据
    Route::post   ('/upload_records'                                        , 'UploadRecordApiController@store')                        ->name('upload_records.store');           #创建
    Route::put    ('/upload_records/{operationg_log}'                       , 'UploadRecordApiController@update')                       ->name('upload_records.update');          #更新
    Route::delete ('/upload_records/{operationg_log}'                       , 'UploadRecordApiController@destroy')                      ->name('upload_records.destroy');         #删除

    Route::get    ('/links'                                                 , 'LinkApiController@index')                                ->name('links.index');                    #获取数据
    Route::post   ('/links'                                                 , 'LinkApiController@store')                                ->name('links.store');                    #创建
    Route::put    ('/links/{operationg_log}'                                , 'LinkApiController@update')                               ->name('links.update');                   #更新
    Route::delete ('/links/{operationg_log}'                                , 'LinkApiController@destroy')                              ->name('links.destroy');                  #删除

    Route::get    ('/contents'                                              , 'ContentApiController@index')                             ->name('contents.index');                 #获取数据
    Route::post   ('/contents'                                              , 'ContentApiController@store')                             ->name('contents.store');                 #创建
    Route::put    ('/contents/{operationg_log}'                             , 'ContentApiController@update')                            ->name('contents.update');                #更新
    Route::delete ('/contents/{operationg_log}'                             , 'ContentApiController@destroy')                           ->name('contents.destroy');               #删除

});
