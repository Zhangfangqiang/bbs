<div class="media @if($key == 0) pt-0 @endif">
  <img src="{{ImgRe($value->user->avatar ,400 ,400)}}" class="mr-3" alt="{{$value->user->name}}">
  <div class="media-body">
    <h5 class="mt-0">{{$value->user->name}}</h5>
    <p>
      {{$value->content}}
      <a class="btn btn-sm btn-outline-dark float-lg-right zf-comment-reply" data-id="{{$value['id']}}" href="#zf-comment-form" id="reply{{$value['id']}}">
        回复
      </a>
    </p>

    @if(!empty($value->items))
      @each('web.comments._list_each',$value->items , 'value')
    @endif
  </div>
</div>
