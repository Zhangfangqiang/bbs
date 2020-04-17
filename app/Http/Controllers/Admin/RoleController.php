<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\Admin\RoleRequest;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    /**
     * 展示数据页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.roles.index' );
    }

    /**
     * 展示创建页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.roles.create');
    }


    /**
     * 展示编辑页
     * @param $id
     * @param Role
     */
    public function edit(RoleRequest $request ,Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

}
