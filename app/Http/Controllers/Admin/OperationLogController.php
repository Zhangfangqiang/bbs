<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OperatingLog;
use App\Http\Controllers\Controller;

class OperationLogController extends Controller
{
    /**
     * 操作日志展示首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.operating_log.index');
    }
}
