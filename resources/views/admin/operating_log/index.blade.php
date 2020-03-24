@extends('admin.layouts.iframe')

{{--后置css样式开始--}}
@section('after_css')

@endsection
{{--后置css样式结束--}}

{{--中间内容开始--}}
@section('content')
  <div class="layui-fluid">
    <div class="layui-card">
      {{--搜索框开始--}}
      <div class="layui-form layui-card-header layuiadmin-card-header-auto">
        <div class="layui-form-item">
          <div class="layui-inline">
            <label class="layui-form-label">文章ID</label>
            <div class="layui-input-inline">
              <input type="text" name="id" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-inline">
            <label class="layui-form-label">作者</label>
            <div class="layui-input-inline">
              <input type="text" name="author" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-inline">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-inline">
              <input type="text" name="title" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-inline">
            <label class="layui-form-label">文章标签</label>
            <div class="layui-input-inline">
              <select name="label">
                <option value="">请选择标签</option>
                <option value="0">美食</option>
                <option value="1">新闻</option>
                <option value="2">八卦</option>
                <option value="3">体育</option>
                <option value="4">音乐</option>
              </select>
            </div>
          </div>
          <div class="layui-inline">
            <button class="layui-btn layuiadmin-btn-list" lay-submit lay-filter="LAY-app-contlist-search">
              <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
            </button>
          </div>
        </div>
      </div>
      {{--搜索框结束--}}

      {{--数据展现开始--}}
      <div class="layui-card-body">
        <div style="padding-bottom: 10px;">
          <button class="layui-btn layuiadmin-btn-list" data-type="batchdel">删除</button>
          <button class="layui-btn layuiadmin-btn-list" data-type="add">添加</button>
        </div>

        {{--表格数据内容开始--}}
        <table id="operation-log-table" lay-filter="operation-log-table"></table>
        {{--表格数据内容结束--}}

        {{--对这条数据进行操作的操作栏开始--}}
        <script type="text/html" id="operation-log-operation">
          <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
          <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
        </script>
        {{--对这条数据进行操作的操作栏结束--}}

      </div>
      {{--数据展现结束--}}
    </div>
  </div>
@endsection
{{--中间内容结束--}}


{{--后置js开始--}}
@section('after_js')
  <script>
    $layui.use(['index', 'table' , 'laydate'],function () {
      /**
       * 定义引入模块的调用变量 和 php new 一个类使用差不多吧?_?
       */
      var $       = layui.$;
      var form    = layui.form;
      var table   = layui.table;
      var laydate = layui.laydate;

      /**
       * 设置ajax csrf_token
       */
      $.ajaxSetup({
        data: {_token: '{{csrf_token()}}' },
      });

      /**
       * 刷新
       */
      $('#LAY-app-order-refresh').click(function(){
        location.reload();
      })

      /**
       * 监听表格渲染
       */
      table.render({
        elem: "#operation-log-table",
        url: "{{route('api.admin.v1.operation_log.index')}}",
        request:{
          limitName: 'paginate'
        },
        parseData:function(data){
          return {
            "code"  : 0,
            "msg"   : 0,
            "count" : data.meta.total,
            "data"  : data.data
          }
        },
        cols: [[
          {type: "numbers"     , fixed: "left"},
          {field: "user_id"    , title: "user_id"},
          {field: "methods"    , title: "methods"},
          {field: "data"       , title: "data"},
          {field: "created_at" , title: "创建时间" ,sort: true},
          {field: "updated_at" , title: "更新时间" ,sort: true},
          {title: "操作", align: "center", fixed: "right", toolbar: "#operation-log-operation"}
        ]],
        page: !0,
        limit: 15,
        limits: [10, 15, 20, 25, 30],
        text: "对不起，加载出现异常！",
      });

    })
  </script>
@endsection
{{--后置js结束--}}
