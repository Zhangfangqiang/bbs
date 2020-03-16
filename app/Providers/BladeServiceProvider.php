<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 获取评论数据
         */
        Blade::directive('comments', function ($expression) {
            return "<?php
                \$comments = new App\Models\Comment;
                \$comments = \$comments->getData(" . $expression . ");
            ?>
            ";
        });
        /**
         * 获取评论数据尾部标签
         * 这个可以没有但是我就是要好看的双标签 -_-!
         */
        Blade::directive('endcomments' ,function (){
            return '';
        });

        /**
         * 获取通知数据
         */
        Blade::directive('notifications', function ($expression) {
            return "<?php
                \$notifications = new App\Models\Notification ;
                \$notifications = \$notifications->getData(" . $expression . ");
            ?>
            ";
        });
        /**
         * 获取通知数据尾部标签
         * 这个可以没有但是我就是要好看的双标签 -_-!
         */
        Blade::directive('endnotifications' ,function (){
            return '';
        });



    }
}
