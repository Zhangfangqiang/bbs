<?php

namespace App\Http\Controllers\Web;

use App\Models\Content;
use App\Models\CategoryHasContent;
use App\Http\Requests\Web\ContentRequest;
use App\Http\Controllers\Controller;

class ContentsController extends Controller
{
    /**
     * 内容首页
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContentRequest $request)
    {
        $contents = Content::with('category', 'user');

        if ($request['category'] = $request->get('category')) {
            $contentIds = CategoryHasContent::whereIn('category_id', findChildren($request['category']))->get()->pluck('content_id');
            $contents   = $contents->whereIn('id', $contentIds);
        }

        $contents = $contents->whereNotNull('release_at')->customOrder($request->get('field'), $request->get('sort'))->paginate();

        return view('web.contents.index', compact('contents'));
    }

    /**
     * 内容创作页
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.contents.create');
    }

    /**
     * 创作内容开始
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $data            = $request->only('title', 'c_id', 'content');
        $content         = Content::create($data);
        $content->category()->attach(explode(',',$data['c_id']));                                              #进行关系关联

        return redirect()->to($content->link())->with('success', '文章创建成功');
    }

    /**
     * 展示内容详情的方法
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContentRequest $request , Content $content)
    {
        if (!empty($content->english_title) && $content->english_title != $request->english_title) {
            return redirect($content->link(), 301);
        }

        $content->increment('watch_count');
        return view('web.contents.show', compact('content'));
    }

    /**
     * 展示编辑页的方法
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        $this->authorize('post-data', $content);
        return view('web.contents.edit', compact('content'));
    }

    /**
     * 内容更新的方法
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, Content $content)
    {
        $this->authorize('post-data', $content);
        $data            = $request->only('title', 'c_id', 'content');
        $content->category()->detach();                                                                                 #先删除关系
        $content->category()->attach(explode(',',$data['c_id']));                                              #进行关系关联
        $content->update($data);                                                                                        #更新数据

        return redirect()->route('web.contents.edit', $content->id)->with('success', '文章更新成功');
    }

    /**
     * 内容删除的方法
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $this->authorize('post-data', $content);
        $content->category()->detach();                     #删除关系
        $content->delete();                                 #删除数据
        return response(['url' => route('web.contents.index')], 200);
    }
}
