<?php

namespace App\Observers;

use App\Models\Content;

class ContentObserver
{
    /**
     * 模型观察器在 Topic 模型保存时触发的 saving 事件中，对 excerpt 字段进行赋值：
     * 保存前操作的方法
     * @param Content $content
     */
    public function saving(Content $content)
    {
        $content->content = clean($content->content, 'user_topic_body');           #防止xss攻击
        $content->excerpt = makeExcerpt($content->content);                               #摘要截取
        $content->user_id = \Auth::user()->id;                                            #获取用户id
        $content->source  = '网站用户:'.\Auth::user()->name;                               #添加作者名称
        $content->seo_key = '个人,原创,游客';                                               #添加seo_key

    }

    /**
     * 保存后操作的方法
     * @param Content $content
     */
    public function saved(Content $content)
    {
        #如果英语标题为空
        if (!$content->english_title) {
            dispatch(new \App\Jobs\Translate($content, 'title', 'english_title'));
        }
    }
}
