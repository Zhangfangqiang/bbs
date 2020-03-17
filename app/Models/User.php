<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;                                    #通知方法
use Illuminate\Foundation\Auth\User           as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;   #定义MustVerifyEmail接口
use Illuminate\Auth\MustVerifyEmail           as MustVerifyEmailTrait;      #实现MustVerifyEmail接口

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmailTrait;
    use Notifiable {
        #给Notifiable trait 里面的 notify 方法定义个别名 为laravelNotify
        notify as protected laravelNotify;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'introduction' , 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 评论通知方法
     *
     * @param $instance
     */
    public function notify($instance)
    {
        #如果要通知的人是当前用户，就不必通知了！
        if ($this->id == \Auth::id()) {
            return;
        }

        #只有数据库类型通知才需提醒，直接发送 Email 或者其他的都 Pass
        if (method_exists($instance, 'toDatabase')) {
            $this->increment('notification_count');
        }

        $this->laravelNotify($instance);
    }

    /**
     * 对发送邮件重置密码方法 进行重置
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\ResetPasswordNotification($token));
    }

    /**
     * 对邮箱验证通知重置
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmail);
    }

    /**
     * 获取用户发布的内容
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    /**
     * 添加了新的关联方法
     * @param $type
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function unreadNotificationsType($type)
    {
        return $this->notifications()->whereNull('read_at')->where('type', '=', $type);
    }

    /**
     * 观看评论后将通知清零 并且将消息已读
     * @param $type
     */
    public function markAsRead($type)
    {
        $notifications = $this->unreadNotificationsType($type);                     #没有阅读的消息并且加上类型关联
        $this->decrement('notification_count',$notifications->count());     #然后减去已读的消息
        $notifications->get()->markAsRead();                                        #将通知已读
        $this->save();
    }
}
