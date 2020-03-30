<div class="layui-side layui-side-menu">
  <div class="layui-side-scroll">
    {{--应用名开始--}}
    <div class="layui-logo" lay-href="{{layuiRoute('admin.operationg_logs.index')}}">
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

          <dd data-name="operationg_logs" class="layui-this">
            <a lay-href="{{layuiRoute('admin.operationg_logs.index')}}">操作日志</a>
          </dd>

          <dd data-name="users" class="">
            <a lay-href="{{layuiRoute('admin.users.index')}}">用户管理</a>
          </dd>

          <dd data-name="categories" class="">
            <a lay-href="{{layuiRoute('admin.categories.index')}}">分类管理</a>
          </dd>

          <dd data-name="upload_records" class="">
            <a lay-href="{{layuiRoute('admin.upload_records.index')}}">上传记录管理</a>
          </dd>

          <dd data-name="links" class="">
            <a lay-href="{{layuiRoute('admin.links.index')}}">友情链接管理</a>
          </dd>

          <dd data-name="contents" class="">
            <a lay-href="{{layuiRoute('admin.contents.index')}}">内容管理</a>
          </dd>







        </dl>


      </li>



    </ul>
    {{--菜单结束--}}
  </div>
</div>
