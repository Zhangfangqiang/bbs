<div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
  <div class="list-group">
    <a class="list-group-item list-group-item-action" href="{{ route('web.notifications.index', ['type'=> 'App\Notifications\ContentCommentsNotification']) }}">内容评论通知</a>
    <a class="list-group-item list-group-item-action" href="{{ route('web.notifications.index', ['type'=> 'App\Notifications\CommentReplyNotification'] ) }}">评论回复通知</a>
  </div>
</div>
