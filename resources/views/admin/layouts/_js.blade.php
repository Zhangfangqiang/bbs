<script src="{{asset('admin/layuiadmin/layui/layui.js')}}"></script>
<script>
  $layui = layui.config({
    base: '/admin/layuiadmin/'  //静态资源所在路径
  }).extend({
    index: 'lib/index',                    //主入口模块
    xmSelect: 'xm-select',          //扩展select

  }).use(['index','xmSelect'],function(){

    var $       = layui.$;

    /**
     * 全局渲染
     */
    if ( $("#user_id_form").length > 0 ) {
      xmSelect.render({
        el          : '#user_id_form',
        name        : 'user_id',
        radio       : true,
        filterable  : true,
        remoteSearch: true,
        remoteMethod: function (val, cb, show) {
          $.ajax({
            url: '{{route('api.admin.v1.users.index')}}',
            data: {
              otherWhere: [
                ['name', 'like', '%' + val + '%']
              ],
              offset: 0,
              limit: 100,
            },
            type: 'GET',
            dataType: 'json',
            success: function (data) {

              var AfteData = [];

              data.data.forEach(function (item, index) {
                AfteData.push({name: item.name, value: item.id})
              })

              cb(AfteData);
            }
          })
        }
      })
    }


  });
</script>

{{--后置js开始--}}
@yield('after_js')
{{--后置js结束--}}
