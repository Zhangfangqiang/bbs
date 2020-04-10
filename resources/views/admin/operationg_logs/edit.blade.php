@extends('admin.layouts.iframe')

{{--后置css样式开始--}}
@section('after_css')

@endsection
{{--后置css样式结束--}}

@section('content')
<form class="layui-form">
    <div class="layui-form-item">
    <label class="layui-form-label">User Id:</label>
    <div class="layui-input-block">
        <input type="number" name="user_id" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Uri:</label>
    <div class="layui-input-block">
        <textarea name="uri" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Methods:</label>
    <div class="layui-input-block">
        <input type="text" name="methods" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Data:</label>
    <div class="layui-input-block">
        <textarea name="data" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
</div>





    <!--  lay-submit  绑定触发提交的元素-->
    <!--  lay-filter  事件过滤器，主要用于事件的精确匹配，跟选择器是比较类似的。其实它并不私属于form模块，它在 layui 的很多基于事件的接口中都会应用到。 理解为id选择器 -->
    <input type="button" id="operationg_logs-back-submit" lay-filter="operationg_logs-back-submit" lay-submit value="确认">
</form>
@endsection

{{--后置js开始--}}
@section('after_js')
<script>
    $layui.use(['index', 'form' , 'upload'],function () {
        var $      = layui.$;
        var form   = layui.form;
        var upload = layui.upload;
    })
</script>
@endsection
{{--后置js结束--}}
