<script src="{{asset('admin/layuiadmin/layui/layui.js')}}"></script>
<script>
  $layui = layui.config({
    base: '/admin/layuiadmin/'  //静态资源所在路径
  }).extend({
    index: 'lib/index'          //主入口模块
  }).use(['index']);
</script>

{{--后置js开始--}}
@yield('after_js')
{{--后置js结束--}}
