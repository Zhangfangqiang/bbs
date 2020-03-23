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

#路由前戳 前端命名空间
Route::group(['prefix' => 'web', 'namespace' => 'Web'], function () {

    Route::get  ('/contents/index'    , 'ContentsController@index') ->name('web.contents.index');           #内容首页

    #登录 && 邮件认证 后可以访问的地址
    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::any    ('/ueditor/upload'                        , 'UeditorController@upload')                          ->name('web.ueditor.upload');                                #百度编辑器主控文件

        Route::get    ('/users/{user}/edit'                     , 'UsersController@edit')                              ->name('web.users.edit');                                    #用户信息编辑页
        Route::put    ('/users/{user}'                          , 'UsersController@update')                            ->name('web.users.update');                                  #用户信息更新
        Route::post   ('/users/attention'                       , 'UsersController@attention')                         ->name('web.users.attention');                               #用户关注.
        Route::post   ('/users/cancelAttention'                 , 'UsersController@cancelAttention')                   ->name('web.users.cancel_attention');                        #取消用户关注.
        Route::get    ('/user/{user}/relation_user'             , 'UsersController@relationUser')                      ->name('web.users.relation_user');                           #用户和用户之间的关联
        Route::get    ('/users/{user}'                          , 'UsersController@show')                              ->name('web.users.show');                                    #用户个人信息页


        Route::get    ('/contents/create'                       , 'ContentsController@create')                         ->name('web.contents.create');                               #内容创建页
        Route::post   ('/contents/store'                        , 'ContentsController@store')                          ->name('web.contents.store');                                #内容创建
        Route::get    ('/contents/{content}/edit'               , 'ContentsController@edit')                           ->name('web.contents.edit');                                 #内容编辑页
        Route::put    ('/contents/{content}'                    , 'ContentsController@update')                         ->name('web.contents.update');                               #内容更新
        Route::delete ('/contents/{content}'                    , 'ContentsController@destroy')                        ->name('web.contents.destroy');                              #内容删除的方法
        Route::post   ('/contents/awesome'                      , 'ContentsController@awesome')                        ->name('web.contents.awesome');                              #内容点赞.
        Route::post   ('/contents/cancel_awesome'               , 'ContentsController@cancelAwesome')                  ->name('web.contents.cancel_awesome');                       #取消内容点赞.
        Route::post   ('/contents/favorite'                     , 'ContentsController@favorite')                       ->name('web.contents.favorite');                             #内容收藏
        Route::post   ('/contents/cancel_favorite'              , 'ContentsController@cancelFavorite')                 ->name('web.contents.cancel_favorite');                      #取消内容收藏.
        Route::get    ('/contents/{user}/content_list'          , 'ContentsController@contentList')                    ->name('web.contents.content_list');                         #内容列表.

        Route::get    ('/notifications/index'                   , 'NotificationsController@index')                     ->name('web.notifications.index');                           #消息通知

        Route::get    ('/categories/popup_list'                 , 'CategoriesController@popupList')                    ->name('web.categories.popup_list');                         #分类内容弹出的列表框

        Route::delete ('/comments/{comment}'                    , 'CommentsController@destroy')                        ->name('web.comments.destroy');                              #评论删除的方法
    });

    Route::post('/comments/store', 'CommentsController@store')->name('web.comments.store');           #创建评论开始
});

#路由前戳 前端命名空间后置
Route::group(['prefix' => 'web', 'namespace' => 'Web'], function () {
    Route::get('/contents/{content}/{english_title?}', 'ContentsController@show')->name('web.contents.show');            #内容详情页
});
