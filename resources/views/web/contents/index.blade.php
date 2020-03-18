@extends('web.layouts.app')

{{--后置css样式开始--}}
@section('after_css')

@endsection
{{--后置css样式结束--}}


{{--中间内容开始--}}
@section('content')
  <div class="row mb-5">
    <div class="col-lg-9 col-md-9 topic-list">
      <div class="card ">

        <div class="card-header bg-transparent">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                排序方式
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('web.contents.index', array_merge(Request::except('page') , ['field'=>'release_at','sort'=>'asc'] ))}}">发布时间正序</a>
                <a class="dropdown-item" href="{{route('web.contents.index', array_merge(Request::except('page') , ['field'=>'release_at','sort'=>'desc']))}}">发布时间倒序</a>
                <a class="dropdown-item" href="{{route('web.contents.index', array_merge(Request::except('page') , ['field'=>'updated_at','sort'=>'asc'] ))}}">最后活跃时间正序</a>
                <a class="dropdown-item" href="{{route('web.contents.index', array_merge(Request::except('page') , ['field'=>'updated_at','sort'=>'desc']))}}">最后活跃时间倒序</a>
              </div>
            </li>
          </ul>
        </div>

        <div class="card-body">
          {{-- 话题列表开始 --}}
          @if (count($contents))
            <ul class="list-unstyled">
              @foreach ($contents as $key => $value)
                <li class="media">
                  <div class="media-left">
                    <a href="{{ route('web.users.show', [$value->user_id]) }}">
                      <img class="media-object img-thumbnail mr-3" style="width: 52px; height: 52px;" src="{{ imgRe($value->user->avatar ,400 ,400) }}" title="{{ $value->user->name }}">
                    </a>
                  </div>

                  <div class="media-body">
                    <div class="media-heading mt-0 mb-1">
                      <a href="{{ $value->link() }}" title="{{ $value->title }}">
                        {{ $value->title }}
                      </a>
                      <a class="float-right" href="{{ $value->link() }}">
                        <span class="badge badge-secondary badge-pill"> {{ $value->comment_count }}</span>
                      </a>
                    </div>

                    <small class="media-body meta text-secondary">

                      <a class="text-secondary" href="{{ route('web.users.show', [$value->user_id]) }}" title="{{ $value->user->name }}">
                        <i class="far fa-user"></i>
                        {{ $value->user->name }}
                      </a>

                      <span class="text-success"> | </span>

                      {{--分类开始--}}
                      {{categoryHtmlTag($value->category)}}
                      {{--分类结束--}}

                      <span class="text-success"> | </span>

                      最后活跃时间:
                      <span class="timeago" title="最后活跃于：{{ $value->updated_at }}">{{ $value->updated_at }}</span>

                      <span class="text-success"> | </span>

                      发布时间:
                      <span class="timeago" title="发布时间：{{ $value->updated_at }}">{{ $value->release_at }}</span>
                    </small>
                  </div>
                </li>

                {{--如果没有循环到最后一项开始--}}
                @if(!$loop->last)
                  <hr>
                @endif
                {{--如果没有循环到最后一项结束--}}
              @endforeach
            </ul>
          @else
            <div class="empty-block">暂无数据 ~_~ </div>
          @endif
          {{-- 话题列表结束 --}}

          {{-- 分页开始 --}}
          <div class="mt-5">
            {!! $contents->appends(Request::except('page'))->render() !!}
          </div>
          {{-- 分页结束 --}}

        </div>
      </div>
    </div>

    {{--右侧内容开始--}}
    <div class="col-lg-3 col-md-3 sidebar">
      @activeuser
        @if (count($activeusers) > 0)
          <div class="card">
            <div class="card-body active-users pt-2">
              <div class="text-center mt-1 mb-0 text-muted">活跃用户</div>
              <hr class="mt-2">
              @foreach ($activeusers as $value)
                <a class="media mt-2" href="{{ route('web.users.show', $value->id) }}">
                  <div class="media-middle mr-2 ml-1">
                    <img src="{{ imgRe( $value->avatar ,400 ,400 )}}" width="36px" height="36px" class="media-object">
                    <small class="media-heading text-secondary "style="vertical-align: center;">{{ $value->name }}</small>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        @endif
      @endactiveuser
    </div>
    {{--右侧内容结束--}}
  </div>
@endsection
{{--中间内容结束--}}


{{--后置js开始--}}
@section('after_js')

@endsection
{{--后置js结束--}}
