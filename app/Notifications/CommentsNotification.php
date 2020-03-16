<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentsNotification extends Notification implements  ShouldQueue
{
    use Queueable;

    /**
     * 构造参数
     *
     * @var Comment
     */
    public $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * 通过写入数据库通知
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id'      => $this->comment->id,
            'title'   => $this->comment->user->name . ',对您发布的内容进行了回复。',
            'content' => $this->comment->content,
        ];
    }
}
