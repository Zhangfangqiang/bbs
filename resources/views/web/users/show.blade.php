@extends('web.layouts.app')

{{--后置css样式开始--}}
@section('after_css')

@endsection
{{--后置css样式结束--}}


{{--中间内容开始--}}
@section('content')
  <div class="row">

    {{--左侧内容开始--}}
    @include('web.users._left_nav')
    {{--左侧内容结束--}}

    {{--右侧内容开始--}}
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      {{--一个简单的用户信息开始--}}
      <div class="card ">
        <div class="card-body">
          <h1 class="mb-0" style="font-size:22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
          <div class="mt-2">
            <a>获赞数:{{$user->awesome_count}}</a>
            <a>给赞数:{{$user->give_awesome_count}}</a>
            <a>粉丝数:{{$user->follow_count}}</a>
            <a>关注数:{{$user->attention_count}}</a>
            @can('attention',$user)
              <button class="btn btn-sm btn-outline-primary float-right zf-post" data-url="{{route('web.users.attention')}}" data-title="确定要关注?" data-data="{'user_id':'{{$user->id}}'} ">关注+</button>
            @else
              @if(Auth::user()->id != $user->id)
                <button class="btn btn-sm btn-outline-primary float-right zf-post" data-url="{{route('web.users.cancel_attention')}}" data-title="确定要取消关注?" data-data="{'user_id':'{{$user->id}}'} ">取消关注</button>
              @endif
            @endcan
          </div>
        </div>
      </div>
      {{--一个简单的用户信息结束--}}

      {{--用户发布的内容开始--}}
      <div class="card mt-30">
        <h5 class="card-header">最近发布内容</h5>
        <div class="card-body">
          {{--发布的内容开始--}}
          @include('web.users._contents_list')
          {{--发布的内容结束--}}
        </div>
      </div>
      {{--用户发布的内容结束--}}

      {{--用户发布的内容开始--}}
      <div class="card mt-30">
        <h5 class="card-header">最近评论的内容</h5>
        <div class="card-body">
          {{--发布的内容开始--}}
          @include('web.users._contents_list' ,$user)
          {{--发布的内容结束--}}
        </div>
      </div>
      {{--用户发布的内容结束--}}

    </div>
    {{--右侧内容结束--}}

  </div>
@endsection
{{--中间内容结束--}}

{{--后置js开始--}}
@section('after_js')

@endsection
{{--后置js结束--}}
