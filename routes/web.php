<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#登陆注册验证路由集合体
Auth::routes(['verify' => true]);

#路由跳转
Route::redirect('/', '/web/contents/index');

#前端路由
Route::prefix('web')->name('web.')->namespace('Web')->group(function () {

    Route::get  ('/contents/index'    , 'ContentsController@index') ->name('contents.index');           #内容首页

    #登录 && 邮件认证 后可以访问的地址
    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::any    ('/ueditor/upload'                        , 'UeditorController@upload')                          ->name('ueditor.upload');                                #百度编辑器主控文件

        Route::get    ('/users/{user}/edit'                     , 'UsersController@edit')                              ->name('users.edit');                                    #用户信息编辑页
        Route::put    ('/users/{user}'                          , 'UsersController@update')                            ->name('users.update');                                  #用户信息更新
        Route::post   ('/users/attention'                       , 'UsersController@attention')                         ->name('users.attention');                               #用户关注.
        Route::post   ('/users/cancelAttention'                 , 'UsersController@cancelAttention')                   ->name('users.cancel_attention');                        #取消用户关注.
        Route::get    ('/users/{user}/relation_user'            , 'UsersController@relationUser')                      ->name('users.relation_user');                           #用户和用户之间的关联
        Route::get    ('/users/{user}/content_list'             , 'UsersController@contentList')                       ->name('users.content_list');                            #内容列表.
        Route::get    ('/users/{user}/comment_list'             , 'UsersController@commentList')                       ->name('users.comment_list');                            #评论删除的方法
        Route::get    ('/users/{user}'                          , 'UsersController@show')                              ->name('users.show');                                    #用户个人信息页

        Route::get    ('/contents/create'                       , 'ContentsController@create')                         ->name('contents.create');                               #内容创建页
        Route::post   ('/contents/store'                        , 'ContentsController@store')                          ->name('contents.store');                                #内容创建
        Route::get    ('/contents/{content}/edit'               , 'ContentsController@edit')                           ->name('contents.edit');                                 #内容编辑页
        Route::put    ('/contents/{content}'                    , 'ContentsController@update')                         ->name('contents.update');                               #内容更新
        Route::delete ('/contents/{content}'                    , 'ContentsController@destroy')                        ->name('contents.destroy');                              #内容删除的方法
        Route::post   ('/contents/awesome'                      , 'ContentsController@awesome')                        ->name('contents.awesome');                              #内容点赞.
        Route::post   ('/contents/cancel_awesome'               , 'ContentsController@cancelAwesome')                  ->name('contents.cancel_awesome');                       #取消内容点赞.
        Route::post   ('/contents/favorite'                     , 'ContentsController@favorite')                       ->name('contents.favorite');                             #内容收藏
        Route::post   ('/contents/cancel_favorite'              , 'ContentsController@cancelFavorite')                 ->name('contents.cancel_favorite');                      #取消内容收藏.

        Route::get    ('/notifications/index'                   , 'NotificationsController@index')                     ->name('notifications.index');                           #消息通知

        Route::get    ('/categories/popup_list'                 , 'CategoriesController@popupList')                    ->name('categories.popup_list');                         #分类内容弹出的列表框

        Route::delete ('/comments/{comment}'                    , 'CommentsController@destroy')                        ->name('comments.destroy');                              #评论删除的方法
    });

    Route::post('/comments/store', 'CommentsController@store')->name('comments.store');                                                                                         #创建评论开始
});

#前端路由
Route::prefix('web')->name('web.')->namespace('Web')->group(function () {
    Route::get('/contents/{content}/{english_title?}', 'ContentsController@show')->name('contents.show');            #内容详情页
});


























#后台路由
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    #登录 && 邮件认证 后可以访问的地址
    Route::group(['middleware' => ['auth', 'verified']], function () {

        #框架外部需要嵌套的页面
        Route::get    ('/layouts/index'                         , function () {return view('admin.layouts.index');})  ->name('layouts.index');

        Route::get    ('/operation_log/index'                   , 'OperationLogController@index')                           ->name('operation_log.index');      #数据展示页
        Route::get    ('/operation_log/create'                  , 'OperationLogController@create')                          ->name('operation_log.create');     #创建页
        Route::get    ('/operation_log/{permission}/edit'       , 'OperationLogController@edit')                            ->name('operation_log.edit');       #编辑页

    });
});
