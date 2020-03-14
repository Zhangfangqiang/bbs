<?php

namespace App\Http\Controllers\Web;

use App\Models\Comment;
use App\Notifications\CommentsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * 创建评论的方法
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if (!\Auth::check()) {                                                  #如果你没有登录
            if (!$this->login($request)) {                                      #并且登录失败
                return redirect(redirect()->back()->getTargetUrl() . '#zf-comment-list')->withErrors('用户名或密码错误');
            }
        }
        $validate = Validator::make($request->only('content', 'captcha', 'model_type', 'model_id', 'parent_id'),
            [
                'content'    => ['required', 'string' , 'max:1000'],
                'captcha'    => ['required', 'captcha', 'max:255'],
                'model_type' => ['required', 'string' , 'max:255', 'in:App\Models\Content'],
                'model_id'   => ['required', 'numeric', 'max:255', function ($key, $value) use ($request) {
                    $array = ['App\Models\Article','App\Models\Img'];
                    if (!in_array($request->model_type, $array)) {
                        return false;
                    }
                    $model = new $request->model_type;
                    if(is_null($model->find($value))){
                        return false;
                    }
                }],
                'parent_id'  => ['nullable','numeric','exists:comments,id']
            ],[
                'captcha.required' => '验证码不能为空',
                'captcha.captcha'  => '请输入正确的验证码',
            ])->validate();


        if (!is_null($validate['parent_id'])) {
            $validate['to_user_id'] = Comment::find($validate['parent_id'])->user_id;
        }

        $validate['status']  = 1;
        $validate['user_id'] = \Auth::user()->id;

        $comment = Comment::create($validate);
        $comment->whatContent->user->notify(new CommentsNotification($comment));

        return redirect(redirect()->back()->getTargetUrl() . '#zf-comment-list');
    }
}
