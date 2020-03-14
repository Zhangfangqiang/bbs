<div class="card mt-3">
  <form action="{{route('web.comments.store')}}"  method="post" id="zf-comment-form">
    <div class="row no-gutters">
      @guest
        <div class="p-2 col-6">
          <input type="text" class="form-control" name="email" value="" placeholder="请输入登录邮箱">
        </div>
        <div class="p-2 col-6">
          <input type="text" class="form-control" name="password" value="" placeholder="请输入密码">
        </div>
      @endguest

      <div class="p-2 col-12">
        <textarea name="content" class="form-control" id="" cols="30" rows="10">
          写的不错我会关注你的!!!
          我就是来水经验的哈哈哈!!!
          T_T
        </textarea>
      </div>

      <div class="p-2 col-6">
        <input type="text" class="form-control" name="captcha" value="" placeholder="请输入验证码">
      </div>

      <div class="p-2 col-2">
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
      </div>

      <div class="p-2 col-2">
        @csrf
        <input type="text"   hidden name="model_type" value="{{get_class($model)}}">
        <input type="number" hidden name="model_id" value="{{$model->id}}">
        <input type="text"   hidden name="parent_id">
        <button type="submit" class="btn btn-outline-dark">提交</button>
      </div>
    </div>
  </form>
</div>
