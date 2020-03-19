<div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
  <div class="card">
    <img class="card-img-top" src="{{imgRe($user->avatar , 400 , 400)}}" alt="{{ $user->name }}">
    <div class="card-body">
      <h5><strong>个人简介</strong></h5>
      <p>{{ $user->introduction }}</p>
      <hr>
      <h5><strong>注册于</strong></h5>
      <p>{{ $user->created_at->diffForHumans() }}</p>
    </div>
  </div>

  <div class="list-group mt-30">
    <a class="list-group-item list-group-item-action" href="{{ route('web.users.show', $user->id) }}">个人中心</a>
    @can('user', $user)
    <a class="list-group-item list-group-item-action" href="{{ route('web.users.edit', $user->id) }}">编辑个人资料</a>
    <a class="list-group-item list-group-item-action" href="{{ route('web.contents.create', $user->id) }}">创建内容</a>
    <a class="list-group-item list-group-item-action" href="{{ route('web.notifications.index', ['type' => 'App\Notifications\ContentCommentsNotification' ]) }}">
      消息通知
      <span class="badge badge-danger float-right" {{ Auth::user()->notification_count > 0 ? '' : 'hidden' }} >{{ Auth::user()->notification_count }}</span>
    </a>
    @endcan
  </div>
</div>
