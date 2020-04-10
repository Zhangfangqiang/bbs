@extends('admin.layouts.iframe')

{{--后置css样式开始--}}
@section('after_css')

@endsection
{{--后置css样式结束--}}

@section('content')
  <form class="layui-form">
    <div class="layui-form-item">
      <label class="layui-form-label">上一篇文章</label>
      <div class="layui-input-block">
        <input type="number" name="parent_id" value="" class="layui-input">
      </div>
    </div>


    <div class="layui-form-item">
      <label class="layui-form-label">是否评论:</label>
      <div class="layui-input-block">
        <input type="text" name="is_comment" hidden>
        <input type="checkbox" name="is_comment" value="1" lay-skin="primary" title="写作" checked="">
      </div>
    </div>


    <div class="layui-form-item">
      <label class="layui-form-label">是否置顶:</label>
      <div class="layui-input-block">
        <input type="text" name="is_top" hidden>
        <input type="checkbox" name="is_top" value="1" lay-skin="primary" title="写作" checked="">
      </div>
    </div>


    <div class="layui-form-item">
      <label class="layui-form-label">是否推荐:</label>
      <div class="layui-input-block">
        <input type="text" name="is_recommended" hidden>
        <input type="checkbox" name="is_recommended" value="1" lay-skin="primary" title="写作" checked="">
      </div>
    </div>


    <div class="layui-form-item">
      <label class="layui-form-label">类型:</label>
      <div class="layui-input-block">
        <input type="text" name="type" hidden>
        <input type="checkbox" name="type" value="1" lay-skin="primary" title="写作" checked="">
      </div>
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
      <label class="layui-form-label">文本内容:</label>
      <div class="layui-input-block">
        <textarea name="content" placeholder="请输入内容" class="layui-textarea"></textarea>
      </div>
    </div>

    <!--  lay-submit  绑定触发提交的元素-->
    <!--  lay-filter  事件过滤器，主要用于事件的精确匹配，跟选择器是比较类似的。其实它并不私属于form模块，它在 layui 的很多基于事件的接口中都会应用到。 理解为id选择器 -->
    <input type="button" id="contents-back-submit" lay-filter="contents-back-submit" lay-submit value="确认">
  </form>
@endsection

{{--后置js开始--}}
@section('after_js')
  <script>
    $layui.use(['index', 'form', 'upload'], function () {
      var $ = layui.$;
      var form = layui.form;
      var upload = layui.upload;
    })
  </script>
@endsection
{{--后置js结束--}}
