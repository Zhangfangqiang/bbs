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
      <div class="card ">
        <div class="card-body">
          <h1 class="mb-0" style="font-size:22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
        </div>
      </div>
      <hr>

      {{--用户发布的内容开始--}}
      <div class="card ">
        <div class="card-body">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active bg-transparent" href="#">Ta 发布的内容</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Ta 的回复</a></li>
          </ul>

          {{--发布的内容开始--}}
          @include('web.users._contents_list', ['contents' => $user->contents()->customOrder()->paginate(5)])
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
