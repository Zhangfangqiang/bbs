<div class="card mt-3" id="zf-comment-list">
  <div class="card-header">
    <h5 class="card-title mb-0">评论列表</h5>
  </div>

  <div class="card-body">

  @php
    $configArray = [
      'model'    => $model,
      'paginate' => 15
    ];
  @endphp
    {{--评论列表开始--}}
    @comments($configArray)
    @if(count($comments) != 0)
      @foreach($comments as $key => $value)

        <div class="media">
          <img src="..." class="mr-3" alt="...">
          <div class="media-body">
            <h5 class="mt-0">Media heading</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-3">
              <a class="mr-3" href="#">
                <img src="..." class="mr-3" alt="...">
              </a>
              <div class="media-body">
                <h5 class="mt-0">Media heading</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
          </div>
        </div>



      @endforeach
    @else
      还没有人评论,抢占前排沙发
    @endif
    @endcomments
    {{--评论列表结束--}}
  </div>
</div>

