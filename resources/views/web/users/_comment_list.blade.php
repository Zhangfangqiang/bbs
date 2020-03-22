@php
  $config = [
    'with'          => ['user','commentable'],
    'otherWhere'    => [
      ['user_id'         , '=' , $user->id]
     ],
     'order'        => ['created_at' , 'desc'],
     'offset'       => 0,
     'limit'        => 15
  ];
@endphp
{{--评论列表开始--}}
@comments($config)
@if(count($comments) != 0)
  @foreach($comments as $key => $comment)
    <div class="media">
      <img src="{{ImgRe( $comment->user->avatar ,400 ,400)}}" class="mr-3" alt="" width="40" height="40">
      <div class="media-body">
        <h5 class="mt-0">你对 : "{{$comment->commentable->title}}" 进行了评论</h5>
        {{$comment->content}}
      </div>
    </div>
    @endforeach
@else
  还没有人评论,抢占前排沙发
@endif
@endcomments
{{--评论列表结束--}}
