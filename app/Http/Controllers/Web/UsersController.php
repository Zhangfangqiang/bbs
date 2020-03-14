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
     * @param UserRequest $userRequest
     * @param FileUploadHandler $fileUploadHandler
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $userRequest, User $user)
    {
        $this->authorize('user', $user);                                                                #授权策略
        $data   = $userRequest->only('name', 'email', 'introduction');                                  #获取文本数据

        if($userRequest->avatar){                                                                             #如果选择文件上传
            $config = [
                "pathFormat" => '/avatar/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                "maxSize"    => 2048000,
                "allowFiles" => [".png", ".jpg", ".jpeg", ".gif", ".bmp"]
            ];

            $base64         = "upload";
            $uploader       = new FileUploadHandler($userRequest, 'avatar', $config, $base64);
            $data['avatar'] = $uploader->getFileInfo()['url'];
        }

        $user->update($data);
        return redirect()->route('web.users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
