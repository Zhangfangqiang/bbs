<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Models\UploadRecord;
use App\Http\Requests\Api\Admin\UploadRecordApiRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UploadRecordResources;


class UploadRecordApiController extends Controller
{

    /**
     * 数据
     * @param $MODEL_NAME
     */
    public function index(UploadRecordAPIRequest $request , UploadRecord $uploadRecord )
    {
        UploadRecordResources::wrap('data');
        return UploadRecordResources::collection($uploadRecord->getData($request->all()));
    }

    /**
     * 创建
     * @param $MODEL_NAME
     */
    public function store(UploadRecordAPIRequest $request)
    {
        $input              = $request->all();
        $uploadRecord = UploadRecord::create($input);
        return response('创建成功', 200);
    }

    /**
     * 更新
     * @param $MODEL_NAME
     */
    public function update(UploadRecord $uploadRecord , UploadRecordAPIRequest $request)
    {
        $input = $request->all();
        $uploadRecord->update($input);
        return response('修改成功', 200);
    }

    /**
     * 删除
     * @param $MODEL_NAME
     */
    public function destroy(UploadRecord $uploadRecord)
    {
        $uploadRecord->delete();
        return response( 204);
    }
}
