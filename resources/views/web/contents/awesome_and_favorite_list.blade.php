@extends('web.layouts.app')

{{--后置css样式开始--}}
@section('after_css')

@endsection
{{--后置css样式结束--}}


{{--中间内容开始--}}
@section('content')
  <div class="row">

    {{--左侧内容开始--}}
    @include('web.users._left_nav', $user=Auth::user())
    {{--左侧内容结束--}}

    {{--右侧内容开始--}}
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

      {{--筛选出来的内容开始--}}
      <div class="card">
        <div class="card-header">
          <h5 class="float-left">
            @switch($request->type)
              @case('AWESOME')
              我点赞的内容
              @break
              @case('FAVORITE')
              我收藏的内容
              @break
            @endswitch
          </h5>
        </div>
        <div class="card-body">
          @php
            switch ($request->type)
            {
                case'AWESOME':
                    $contents = $user->awesomeContent();
                    break;
                case'FAVORITE':
                    $contents = $user->favoriteContent();
                    break;
            }
            $contents = $contents->paginate();
          @endphp
          @foreach($contents as $content)
            <li class="list-group-item pl-2 pr-2 border-right-0 border-left-0 text-truncate @if($loop->first) border-top-0  pt-0 @endif">
              <a href="{{ route('web.contents.show', $content->id) }}">
                {{ $content->title }}
              </a>

              {{--操作按钮开始--}}
              @switch($request->type)
                @case('AWESOME')
                <button class="float-right zf-post btn btn-outline-danger btn-sm mr-1"
                        data-url="{{route('web.contents.cancel_awesome')}}" data-title="确定要取消点赞?"
                        data-data="{'content_id':'{{$content->id}}'}">
                  <i class="fas fa-mouse"></i>
                  取消点赞
                </button>
                @break
                @case('FAVORITE')
                <button class="float-right zf-post btn btn-outline-warning btn-sm mr-1" style="color: #212529"
                        data-url="{{route('web.contents.cancel_favorite')}}" data-title="确定取消收藏?"
                        data-data="{'content_id':'{{$content->id}}'}">
                  <i class="fas fa-mouse"></i>
                  取消收藏
                </button>
                @break
              @endswitch
              {{--操作按钮结束--}}
            </li>
          @endforeach
          <div class="mt-30">
          {!! $contents->appends($request->except('page'))->render() !!}
          </div>
        </div>
      </div>
      {{--筛选出来的内容结束--}}

    </div>
    {{--右侧内容结束--}}
  </div>
@endsection
{{--中间内容结束--}}


{{--后置js开始--}}
@section('after_js')

@endsection
{{--后置js结束--}}
