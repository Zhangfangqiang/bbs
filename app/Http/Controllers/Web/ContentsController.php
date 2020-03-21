<?php

namespace App\Http\Controllers\Web;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Requests\Web\ContentRequest;
use App\Http\Controllers\Controller;

class ContentsController extends Controller
{
    /**
     * 内容首页
     * @param ContentRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ContentRequest $request)
    {
        return view('web.contents.index', compact('request'));
    }

    /**
     * 内容创建页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('web.contents.create');
    }

    /**
     * 添加内容的方法
     * @param ContentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContentRequest $request)
    {
        $data            = $request->only('title', 'c_id', 'content');
        $content         = Content::create($data);
        $content->category()->attach(explode(',',$data['c_id']));                                              #进行关系关联

        return redirect()->to($content->link())->with('success', '文章创建成功');
    }

    /**
     * 展示内容详情页
     * @param ContentRequest $request
     * @param Content $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
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
     * 展示内容编辑页
     * @param Content $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Content $content)
    {
        $this->authorize('post-data', $content);
        return view('web.contents.edit', compact('content'));
    }

    /**
     * 内容更新的方法
     * @param ContentRequest $request
     * @param Content $content
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
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
     * 删除内容的方法
     * @param Content $content
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Content $content)
    {
        $this->authorize('post-data', $content);
        $content->delete();                                 #删除数据

        return response(['url' => route('web.contents.index')], 200);
    }


    /**
     * 内容点赞
     * @param UserRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function awesome(Request $request)
    {
        $request->validate([
            'content_id' => ['nullable','numeric','exists:contents,id'],
        ]);
        $this->authorize('awesome',Content::find($request->content_id));
        $request->user()->awesomeContent()->attach($request->content_id);                           #创建关系
        $request->user()->increment('give_awesome_count',1);                                        #给赞数量 +1
        Content::where('id',$request->content_id)->increment('awesome_count',1);                    #内容点赞 +1
        Content::find($request->content_id)->user()->increment('awesome_count',1);   #内容的作者 点赞+1

        return response(['success' => '点赞成功'], 200);
    }

    /**
     * 取消给内容点赞
     * @param UserRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function cancelAwesome(Request $request)
    {
        $request->validate([
            'content_id' => ['nullable','numeric','exists:contents,id'],
        ]);
        $request->user()->awesomeContent()->detach($request->content_id);                           #删除关系
        $request->user()->decrement('give_awesome_count',1);                                        #给赞数量 -1
        Content::where('id',$request->content_id)->decrement('awesome_count',1);                    #内容点赞 -1
        Content::find($request->content_id)->user()->decrement('awesome_count',1);   #内容的作者 点赞-1

        return response(['success' => '取消点赞成功'], 200);
    }
}
