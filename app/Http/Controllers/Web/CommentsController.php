<?php

namespace App\Http\Controllers\Web;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CommentRequest;
use App\Notifications\CommentsNotification;

class CommentsController extends Controller
{
    /**
     * 创建评论的方法
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CommentRequest $request)
    {
        if (!\Auth::check()) {                                                  #如果你没有登录
            if (!\Auth::attempt($request->only('email','password'))) {    #并且登录失败
                return redirect(redirect()->back()->getTargetUrl() . '#zf-comment-list')->withErrors('用户名或密码错误');
            }
        }

        $data = $request->only('content', 'captcha', 'model_type', 'model_id', 'parent_id');

        #如果是对评论回复就多出这一步骤  ^_^ 略略略
        if (!is_null($data['parent_id'])) {
            $parentComment      = Comment::find($data['parent_id']);
            $data['to_user_id'] = $parentComment->user_id;
            $parentComment->whatContent->user->commentNotify(new CommentsNotification($parentComment));
        }

        $data['status']  = 1;
        $data['user_id'] = \Auth::user()->id;
        $comment         = Comment::create($data);

        $comment->whatContent->user->commentNotify(new CommentsNotification($comment));

        return redirect(redirect()->back()->getTargetUrl() . '#zf-comment-list');
    }
}
