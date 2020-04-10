<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Models\OperationgLog;
use App\Http\Requests\Api\Admin\OperationgLogApiRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OperationgLogResources;


class OperationgLogApiController extends Controller
{

    /**
     * 数据
     * @param $MODEL_NAME
     */
    public function index(OperationgLogAPIRequest $request , OperationgLog $operationgLog )
    {
        OperationgLogResources::wrap('data');
        return OperationgLogResources::collection($operationgLog->getData($request->all()));
    }

    /**
     * 创建
     * @param $MODEL_NAME
     */
    public function store(OperationgLogAPIRequest $request)
    {
        $input         = $request->all();
        $operationgLog = OperationgLog::create($input);
        return response(['message' => '创建成功', 'status' => '200'], 200);
    }

    /**
     * 更新
     * @param $MODEL_NAME
     */
    public function update(OperationgLog $operationgLog , OperationgLogAPIRequest $request)
    {
        $input = $request->all();
        $operationgLog->update($input);
        return response(['message' => '修改成功', 'status' => '200'], 200);
    }

    /**
     * 删除
     * @param $MODEL_NAME
     */
    public function destroy(OperationgLog $operationgLog)
    {
        $operationgLog->delete();
        return response( ['message' => '删除成功', 'status' => '200'],204);
    }
}
