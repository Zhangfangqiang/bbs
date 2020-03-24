<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\OperatingLog;
use Illuminate\Http\Request;
use App\Http\Resources\OperatingLogResources;
use App\Http\Controllers\Controller;

class OperationLogController extends Controller
{
    /**
     * 返回列表数据
     * @param Request $request
     */
    public function index(Request $request ,OperatingLog $operatingLog)
    {
        OperatingLogResources::wrap('data');
        return OperatingLogResources::collection($operatingLog->getData($request->all()));
    }
}
