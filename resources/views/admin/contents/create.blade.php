@extends('admin.layouts.iframe')

{{--后置css样式开始--}}
@section('after_css')

@endsection
{{--后置css样式结束--}}

@section('content')
  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-header">添加内容</div>
      <div class="layui-card-body" style="padding: 15px;">
        <div class="layui-tab">
          <ul class="layui-tab-title">
            <li class="layui-this">文章内容</li>
            <li>视频内容</li>
            <li>图片内容</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
              <div class="layui-form">

                <div class="layui-form-item">
                  <label class="layui-form-label"></label>
                  <div class="layui-input-block">
                    <input type="checkbox" name="is_comment" value="1" lay-skin="primary" title="是否评论" checked="">
                    <input type="checkbox" name="is_top" value="1" lay-skin="primary" title="是否置顶" checked="">
                    <input type="checkbox" name="is_recommended" value="1" lay-skin="primary" title="是否推荐" checked="">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">分类:</label>
                  <div class="layui-input-block" id="category_id_form"></div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">标题:</label>
                  <div class="layui-input-block">
                    <input type="text" name="title" value="" class="layui-input">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">Seo 关键词:</label>
                  <div class="layui-input-block">
                    <input type="text" name="seo_key" value="" class="layui-input">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">来源:</label>
                  <div class="layui-input-block">
                    <input type="text" name="source" value="" class="layui-input">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">父类(没有可不写)</label>
                  <div class="layui-input-block">
                    <input type="number" name="parent_id" value="" class="layui-input">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">文本内容:</label>
                  <div class="layui-input-block">
                    <script id="content-field" style="height: 600px" name="content" type="text/plain">{!! old('content') !!}</script>
                  </div>
                </div>

                <div class="layui-form-item layui-layout-admin">
                  <div class="layui-input-block">
                    <div class="layui-footer" style="left: 0;z-index: 9999999;">
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                      <input type="submit"class="layui-btn"  lay-submit id="content-submit-form" lay-filter="content-submit-form"></input>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="layui-tab-item">内容3</div>
            <div class="layui-tab-item">内容4</div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

{{--后置js开始--}}
@section('after_js')
  {{--百度编辑器开始--}}
  <script type="text/javascript" charset="utf-8" src="{{asset('/admin/ueditor/ueditor.config.js')}}"></script>
  <script type="text/javascript" charset="utf-8" src="{{asset('/admin/ueditor/ueditor.all.min.js')}}"> </script>
  <script type="text/javascript" charset="utf-8" src="{{asset('/admin/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
  {{--百度编辑器结束--}}

  <script>
    // 百度编辑器
    var ue = UE.getEditor('content-field');

    $layui.use(['index', 'form', 'upload'], function () {
      var $ = layui.$;
      var form = layui.form;
      var upload = layui.upload;

      form.on('submit(content-submit-form)', function(data){

        $.ajax({
          url: "{{route('api.admin.v1.contents.store')}}",
          type: 'POST',
          dataType: 'json',
          data: data.field,
          success: function (data) {
            layer.msg(data.message);
          }
        })
      })
      return false;
    })


  </script>
@endsection
{{--后置js结束--}}
