<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Handlers\FileUploadHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\UserRequest;

class UsersController extends Controller
{
    /**
     * 展示用户资料
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('web.users.show',compact('user'));
    }

    /**
     * 展示用户资料编辑页
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('user', $user);                          #授权策略
        return view('web.users.edit', compact('user'));
    }

    /**
     * 更新用户数据
     * Update the specified resource in storage.
     * @param UserRequest $request
     * @param FileUploadHandler $fileUploadHandler
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('user', $user);                                                           #授权策略
        $data   = $request->only('name', 'email', 'introduction');                                  #获取文本数据

        if($request->avatar){                                                                             #如果选择文件上传
            $config = [
                "pathFormat" => '/avatar/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                "maxSize"    => 2048000,
                "allowFiles" => [".png", ".jpg", ".jpeg", ".gif", ".bmp"]
            ];

            $base64         = "upload";
            $uploader       = new FileUploadHandler($request, 'avatar', $config, $base64);
            $data['avatar'] = $uploader->getFileInfo()['url'];
        }

        $user->update($data);
        return redirect()->route('web.users.show', $user->id)->with('success', '个人资料更新成功！');
    }

    /**
     * 关注用户的方法
     * @param UserRequest $request
     */
    public function attention(UserRequest $request)
    {
        $this->authorize('attention',User::find($request->id));            #验证权限
        $request->user()->attentionUser()->attach($request->id);                 #创建关注关系
        $request->user()->increment('attention_count',1);                        #我关注的用户+1
        user::where('id',$request->id)->increment('follow_count',1);             #它跟随用户(粉丝) +1

        return response(['success' => '关注成功'], 200);
    }

    /**
     * 取消关注用户的方法
     * @param UserRequest $request
     */
    public function cancelAttention(UserRequest $request)
    {
        $this->authorize('cancelAttention',User::find($request->id));            #验证权限
        $request->user()->attentionUser()->detach($request->id);                        #取消关系
        $request->user()->decrement('attention_count',1);                               #我关注的用户-1
        user::where('id',$request->id)->decrement('follow_count',1);                    #它跟随用户(粉丝)  -1

        return response(['success' => '取消关注成功'], 200);
    }

    public function awesome()
    {

    }
}
