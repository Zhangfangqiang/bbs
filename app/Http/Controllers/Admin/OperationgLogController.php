<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\OperationgLog;
use App\Http\Requests\Admin\OperationgLogRequest;
use App\Http\Controllers\Controller;

class OperationgLogController extends Controller
{

    /**
     * 展示数据页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.operationg_logs.index' );
    }

    /**
     * 展示创建页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.operationg_logs.create');
    }


    /**
     * 展示编辑页
     * @param $id
     * @param OperationgLog
     */
    public function edit(OperationgLogRequest $request ,OperationgLog $operationgLog)
    {
        return view('admin.operationg_logs.edit', compact('operationgLog'));
    }

}
