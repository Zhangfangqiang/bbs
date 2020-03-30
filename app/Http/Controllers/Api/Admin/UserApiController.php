<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Api\Admin\UserApiRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResources;


class UserApiController extends Controller
{

    /**
     * 数据
     * @param $MODEL_NAME
     */
    public function index(UserAPIRequest $request , User $user )
    {
        UserResources::wrap('data');
        return UserResources::collection($user->getData($request->all()));
    }

    /**
     * 创建
     * @param $MODEL_NAME
     */
    public function store(UserAPIRequest $request)
    {
        $input              = $request->all();
        $user = User::create($input);
        return response('创建成功', 200);
    }

    /**
     * 更新
     * @param $MODEL_NAME
     */
    public function update(User $user , UserAPIRequest $request)
    {
        $input = $request->all();
        $user->update($input);
        return response('修改成功', 200);
    }

    /**
     * 删除
     * @param $MODEL_NAME
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response( 204);
    }
}
