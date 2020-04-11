@extends('admin.layouts.iframe')

{{--后置css样式开始--}}
@section('after_css')

@endsection
{{--后置css样式结束--}}

@section('content')
<form class="layui-form">
    <div class="layui-form-item">
    <label class="layui-form-label">Name:</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="" class="layui-input">
    </div>
</div>



<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::date('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<div class="layui-form-item">
    <label class="layui-form-label">Avatar:</label>
    <div class="layui-input-block">
        <input type="text" name="avatar" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Introduction:</label>
    <div class="layui-input-block">
        <input type="text" name="introduction" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Password:</label>
    <div class="layui-input-block">
        <input type="password" name="password" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Remember Token:</label>
    <div class="layui-input-block">
        <input type="text" name="remember_token" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Notification Count:</label>
    <div class="layui-input-block">
        <input type="number" name="notification_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Be Follow Count:</label>
    <div class="layui-input-block">
        <input type="number" name="be_follow_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Follow Count:</label>
    <div class="layui-input-block">
        <input type="number" name="follow_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Be Awesome Count:</label>
    <div class="layui-input-block">
        <input type="number" name="be_awesome_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Awesome Count:</label>
    <div class="layui-input-block">
        <input type="number" name="awesome_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Be Favorite Count:</label>
    <div class="layui-input-block">
        <input type="number" name="be_favorite_count" value="" class="layui-input">
    </div>
</div>



<div class="layui-form-item">
    <label class="layui-form-label">Favorite Count:</label>
    <div class="layui-input-block">
        <input type="number" name="favorite_count" value="" class="layui-input">
    </div>
</div>



<!-- Last Login At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_login_at', 'Last Login At:') !!}
    {!! Form::date('last_login_at', null, ['class' => 'form-control','id'=>'last_login_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#last_login_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush



    <!--  lay-submit  绑定触发提交的元素-->
    <!--  lay-filter  事件过滤器，主要用于事件的精确匹配，跟选择器是比较类似的。其实它并不私属于form模块，它在 layui 的很多基于事件的接口中都会应用到。 理解为id选择器 -->
    <input type="button" id="users-back-submit" lay-filter="users-back-submit" lay-submit value="确认">
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
