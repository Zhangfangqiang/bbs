<div class="layui-side layui-side-menu">
  <div class="layui-side-scroll">
    {{--应用名开始--}}
    <div class="layui-logo" lay-href="home/console.html">
      <span>{{env('APP_NAME')}}</span>
    </div>
    {{--应用名结束--}}

    {{--菜单开始--}}
    <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
      <li data-name="home" class="layui-nav-item layui-nav-itemed">
        <a href="javascript:;" lay-tips="主页" lay-direction="2">
          <i class="layui-icon layui-icon-home"></i>
          <cite>主页</cite>
        </a>
        <dl class="layui-nav-child">
          <dd data-name="console" class="layui-this">
            <a lay-href="home/console.html">控制台</a>
          </dd>
          <dd data-name="console">
            <a lay-href="home/homepage1.html">主页一</a>
          </dd>
          <dd data-name="console">
            <a lay-href="home/homepage2.html">主页二</a>
          </dd>
        </dl>
      </li>

    </ul>
    {{--菜单结束--}}
  </div>
</div>
