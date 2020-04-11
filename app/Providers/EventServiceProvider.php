<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        #注册事件监听
        \Illuminate\Auth\Events\Registered::class => [
            \App\Listeners\Web\SendEmailVerificationNotification::class,
            \App\Listeners\Web\RegisterSuccessTips::class,
        ],
        #验证邮件发送事件
        \Illuminate\Auth\Events\Verified::class => [
            \App\Listeners\Web\EmailVerified::class,
        ],
        #登录事件
        \Illuminate\Auth\Events\Login::class =>[
            \App\Listeners\Web\RecordLoginTime::class,
        ],

        #大型文件上传完成后事件
        \App\Events\Vendor\AetherUploadAfter::class => [
            /*写入到文件上传数据库*/
            \App\Listeners\Vendor\UploadRecordsWrite::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
