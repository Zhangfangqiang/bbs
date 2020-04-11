<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Content::observe(\App\Observers\Web\ContentObserver::class);            #模型观察者绑定
        \App\Models\User::observe(\App\Observers\Web\UserObserver::class);                  #模型观察者绑定
        \App\Models\Comment::observe(\App\Observers\Web\CommentObserver::class);            #模型观察者绑定
    }
}
