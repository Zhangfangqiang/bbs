<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\Api\Admin\RoleApiRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\RoleResources;


class RoleApiController extends Controller
{

    /**
     * 数据
     * @param $MODEL_NAME
     */
    public function index(RoleAPIRequest $request , Role $role )
    {
        RoleResources::wrap('data');
        return RoleResources::collection($role->getData($request->all()));
    }

    /**
     * 创建
     * @param $MODEL_NAME
     */
    public function store(RoleAPIRequest $request)
    {
        $input              = $request->all();
        $role = Role::create($input);
        return response('创建成功', 200);
    }

    /**
     * 更新
     * @param $MODEL_NAME
     */
    public function update(Role $role , RoleAPIRequest $request)
    {
        $input = $request->all();
        $role->update($input);
        return response('修改成功', 200);
    }

    /**
     * 删除
     * @param $MODEL_NAME
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response( 204);
    }
}
