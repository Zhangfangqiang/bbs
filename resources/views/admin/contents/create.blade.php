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
    <label class="layui-form-label">Parent Id:</label>
    <div class="layui-input-block">
        <input type="number" name="parent_id" value="" class="layui-input">
    </div>
</div>






<div class="layui-form-item">
    <label class="layui-form-label">Is Comment:</label>
    <div class="layui-input-block">
        <input type="text"  name="is_comment" hidden>
        <input type="checkbox" name="is_comment" value="1" lay-skin="primary" title="写作" checked="">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Is Top:</label>
    <div class="layui-input-block">
        <input type="text"  name="is_top" hidden>
        <input type="checkbox" name="is_top" value="1" lay-skin="primary" title="写作" checked="">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Is Recommended:</label>
    <div class="layui-input-block">
        <input type="text"  name="is_recommended" hidden>
        <input type="checkbox" name="is_recommended" value="1" lay-skin="primary" title="写作" checked="">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Type:</label>
    <div class="layui-input-block">
        <input type="text"  name="type" hidden>
        <input type="checkbox" name="type" value="1" lay-skin="primary" title="写作" checked="">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Watch Count:</label>
    <div class="layui-input-block">
        <input type="number" name="watch_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Favorite Count:</label>
    <div class="layui-input-block">
        <input type="number" name="favorite_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Awesome Count:</label>
    <div class="layui-input-block">
        <input type="number" name="awesome_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Comment Count:</label>
    <div class="layui-input-block">
        <input type="number" name="comment_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Title:</label>
    <div class="layui-input-block">
        <input type="text" name="title" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">English Title:</label>
    <div class="layui-input-block">
        <input type="text" name="english_title" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Seo Key:</label>
    <div class="layui-input-block">
        <input type="text" name="seo_key" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Excerpt:</label>
    <div class="layui-input-block">
        <input type="text" name="excerpt" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Source:</label>
    <div class="layui-input-block">
        <input type="text" name="source" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Content:</label>
    <div class="layui-input-block">
        <textarea name="content" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Video:</label>
    <div class="layui-input-block">
        <textarea name="video" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Img:</label>
    <div class="layui-input-block">
        <input type="text" name="img" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">More:</label>
    <div class="layui-input-block">
        <textarea name="more" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
</div>



<!-- Release At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('release_at', 'Release At:') !!}
    {!! Form::date('release_at', null, ['class' => 'form-control','id'=>'release_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#release_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Delete At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delete_at', 'Delete At:') !!}
    {!! Form::date('delete_at', null, ['class' => 'form-control','id'=>'delete_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#delete_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush



    <!--  lay-submit  绑定触发提交的元素-->
    <!--  lay-filter  事件过滤器，主要用于事件的精确匹配，跟选择器是比较类似的。其实它并不私属于form模块，它在 layui 的很多基于事件的接口中都会应用到。 理解为id选择器 -->
    <input type="button" id="contents-back-submit" lay-filter="contents-back-submit" lay-submit value="确认">
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
