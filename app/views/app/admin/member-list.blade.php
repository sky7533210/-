<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/assets/css/font.css">
    <link rel="stylesheet" href="/assets/css/xadmin.css">
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/assets/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="layui-anim layui-anim-up">
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input" placeholder="开始日" autocomplete="off" name="start" id="start">
          <input class="layui-input" placeholder="截止日" autocomplete="off" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit  lay-filter="search"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>

      <table class="layui-hide" id="table_user" lay-filter="table_user"></table>

      <script type="text/html" id="barDemo">
        <a title="编辑"  href="javascript:;" lay-event="edit">
          <i class="layui-icon">&#xe642;</i>
        </a>
      </script>

    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });


      layui.use('table', function(){
          var table = layui.table;

          table.render({
              elem: '#table_user'
              ,url:"/admin/memberlist"
              ,method:"POST"
              ,cols: [[
                  {field:'id', width:120, title: 'ID',align: 'center', sort: true}
                  ,{field:'phone', width:120, title: '手机',align: 'center'}
                  ,{field:'username', minWidth:120, title: '呢称',align: 'center'}
                  ,{field:'email', minWidth:100, title: '邮箱',align: 'center'}
                  ,{field:'create_time', width:200, title: '创建时间' ,align: 'center'}
                  ,{field:'status',width: 140, title: '状态',templet: function(d){
                      if(d.status==1)
                          return '<input type="checkbox" name="lock" value="1" did="'+d.id+'" title="已启用" lay-filter="lockDemo" checked>'
                      else
                          return '<input type="checkbox" name="lock" value="0" did="'+d.id+'"  title="已启用" lay-filter="lockDemo">'
                  } ,align: 'center'}
                  ,{fixed: 'right',title:'操作', width:140, align:'center', toolbar: '#barDemo'}
              ]]
              ,page:{
                  limit:5
                  ,limits:[5,10,15,20]
              }
          });
          table.on('tool(table_user)', function(obj){
              var data = obj.data;
              if(obj.event === 'edit'){
                  x_admin_show('编辑','/admin/membereidt?id='+data.id,600,400);
              }
          });

          form=layui.form;

          form.on('checkbox(lockDemo)', function(obj){
              if(this.value==1){
                  this.value="0";
                  $.get("/admin/changestatus?id="+this.getAttribute("did")+"&status="+0);
              }else{
                  this.value="1";
                  $.get("/admin/changestatus?id="+this.getAttribute("did")+"&status="+1);

              }
          });

          form.on('submit(search)', function(arg){
              table.reload('table_user',{
                  url:"/admin/memberquery"
                  ,where:arg.field
              });
              return false;
          });
      });
    </script>
  </body>

</html>