<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\UploadRecord;
use App\Http\Requests\Admin\UploadRecordRequest;
use App\Http\Controllers\Controller;

class UploadRecordController extends Controller
{

    /**
     * 展示数据页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.upload_records.index' );
    }

    /**
     * 展示创建页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.upload_records.create');
    }


    /**
     * 展示编辑页
     * @param $id
     * @param UploadRecord
     */
    public function edit(UploadRecordRequest $request ,UploadRecord $uploadRecord)
    {
        return view('admin.upload_records.edit', compact('uploadRecord'));
    }

}
