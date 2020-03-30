<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Http\Requests\Api\Admin\ContentApiRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ContentResources;


class ContentApiController extends Controller
{

    /**
     * 数据
     * @param $MODEL_NAME
     */
    public function index(ContentAPIRequest $request , Content $content )
    {
        ContentResources::wrap('data');
        return ContentResources::collection($content->getData($request->all()));
    }

    /**
     * 创建
     * @param $MODEL_NAME
     */
    public function store(ContentAPIRequest $request)
    {
        $input              = $request->all();
        $content = Content::create($input);
        return response('创建成功', 200);
    }

    /**
     * 更新
     * @param $MODEL_NAME
     */
    public function update(Content $content , ContentAPIRequest $request)
    {
        $input = $request->all();
        $content->update($input);
        return response('修改成功', 200);
    }

    /**
     * 删除
     * @param $MODEL_NAME
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return response( 204);
    }
}
