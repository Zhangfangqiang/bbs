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

    #必须登录才能获取的接口
    Route::group(['middleware' => ['api', 'auth:api']], function () {
        Route::get    ('/operationg_logs'                                       , 'OperationgLogApiController@index')                       ->name('operationg_logs.index');          #获取数据

        Route::get    ('/users'                                                 , 'UserApiController@index')                                ->name('users.index');                    #获取数据
        Route::post   ('/users'                                                 , 'UserApiController@store')                                ->name('users.store');                    #创建
        Route::put    ('/users/{user}'                                          , 'UserApiController@update')                               ->name('users.update');                   #更新
        Route::delete ('/users/{user}'                                          , 'UserApiController@destroy')                              ->name('users.destroy');                  #删除

        Route::get    ('/category_has_contents'                                 , 'CategoryHasContentApiController@index')                  ->name('category_has_contents.index');    #获取数据

        Route::get    ('/categories'                                            , 'CategoryApiController@index')                            ->name('categories.index');               #获取数据
        Route::post   ('/categories'                                            , 'CategoryApiController@store')                            ->name('categories.store');               #创建
        Route::put    ('/categories/{category}'                                 , 'CategoryApiController@update')                           ->name('categories.update');              #更新
        Route::delete ('/categories/{category}'                                 , 'CategoryApiController@destroy')                          ->name('categories.destroy');             #删除

        Route::get    ('/upload_records'                                        , 'UploadRecordApiController@index')                        ->name('upload_records.index');           #获取数据
        Route::post   ('/upload_records'                                        , 'UploadRecordApiController@store')                        ->name('upload_records.store');           #创建
        Route::put    ('/upload_records/{upload_record}'                        , 'UploadRecordApiController@update')                       ->name('upload_records.update');          #更新
        Route::delete ('/upload_records/{upload_record}'                        , 'UploadRecordApiController@destroy')                      ->name('upload_records.destroy');         #删除

        Route::get    ('/links'                                                 , 'LinkApiController@index')                                ->name('links.index');                    #获取数据
        Route::post   ('/links'                                                 , 'LinkApiController@store')                                ->name('links.store');                    #创建
        Route::put    ('/links/{link}'                                          , 'LinkApiController@update')                               ->name('links.update');                   #更新
        Route::delete ('/links/{link}'                                          , 'LinkApiController@destroy')                              ->name('links.destroy');                  #删除

        Route::get    ('/contents'                                              , 'ContentApiController@index')                             ->name('contents.index');                 #获取数据
        Route::post   ('/contents'                                              , 'ContentApiController@store')                             ->name('contents.store');                 #创建
        Route::put    ('/contents/{content}'                                    , 'ContentApiController@update')                            ->name('contents.update');                #更新
        Route::delete ('/contents/{content}'                                    , 'ContentApiController@destroy')                           ->name('contents.destroy');               #删除

        Route::get    ('/contents'                                              , 'ContentApiController@index')                             ->name('contents.index');                 #获取数据
        Route::post   ('/contents'                                              , 'ContentApiController@store')                             ->name('contents.store');                 #创建
        Route::put    ('/contents/{content}'                                    , 'ContentApiController@update')                            ->name('contents.update');                #更新
        Route::delete ('/contents/{content}'                                    , 'ContentApiController@destroy')                           ->name('contents.destroy');               #删除

        Route::get    ('/permissions'                                           , 'PermissionApiController@index')                          ->name('permissions.index');              #获取数据
        Route::post   ('/permissions'                                           , 'PermissionApiController@store')                          ->name('permissions.store');              #创建
        Route::put    ('/permissions/{permission}'                              , 'PermissionApiController@update')                         ->name('permissions.update');             #更新
        Route::delete ('/permissions/{permission}'                              , 'PermissionApiController@destroy')                        ->name('permissions.destroy');            #删除

        Route::get    ('/roles'                                                 , 'RoleApiController@index')                                ->name('roles.index');                    #获取数据
        Route::post   ('/roles'                                                 , 'RoleApiController@store')                                ->name('roles.store');                    #创建
        Route::put    ('/roles/{role}'                                          , 'RoleApiController@update')                               ->name('roles.update');                   #更新
        Route::delete ('/roles/{role}'                                          , 'RoleApiController@destroy')                              ->name('roles.destroy');                  #删除



    });

});
