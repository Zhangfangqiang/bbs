<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentReplyNotification extends Notification implements ShouldQueue
{
    public $comment;

    use Queueable;

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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $prentComment = $this->comment->parent;                                                #获得我评论的评论 父评论
        $link         =  $prentComment->commentable->link(['#reply' . $this->comment->id]);    #通过内容找到该评论 估计评论多的话会有点困难  需要给评论单独做一个模块 哇哇哇

        #存入数据库里的数据
        return [
            'comment_id'            => $this->comment->id,
            'comment_content'       => $this->comment->content,
            'comment_user_id'       => $this->comment->user->id,
            'comment_user_name'     => $this->comment->user->name,
            'comment_user_avatar'   => $this->comment->user->avatar,

            'prent_comment_link'    => $link,
            'prent_comment_id'      => $prentComment->id,
            'prent_comment_content'   => $prentComment->content,
        ];
    }
}
