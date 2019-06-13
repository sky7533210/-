<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
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
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">

    <table class="layui-hide" id="table_image" lay-filter="table_image"></table>

    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <button class="layui-btn layui-btn-sm" lay-event="identify">识别违规图片</button>
        </div>
    </script>

    <script type="text/html" id="barDemo">
        <a title="查看原图" href="javascript:;" lay-event="view">
            <i class="layui-icon">&#xe642;</i>
        </a>
        <a title="设置违规" href="javascript:;" lay-event="set">
            <i class="layui-icon">&#xe626;</i>
        </a>
    </script>

</div>
<script>
    layui.use('laydate', function () {
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

    layui.use('table', function () {
        var table = layui.table;

        table.render({
            elem: '#table_image'
            , url: "/admin/imglist"
            , method: "POST"
            ,toolbar:"#toolbarDemo"
            , cols: [[
                {field: 'id', width: 120, height:150 ,title: 'ID', align: 'center', sort: true}
                , {
                    field: 'img', width: 120, height:150 , title: '缩略图', align: 'center', templet: function (d) {
                        return '<img src="/assets/uploads/'+d.md5+d.type+'" width="80px" height="50px">'
                    }
                }
                , {field: 'type', minWidth: 120,height:150 , title: '后缀', align: 'center'}
                , {field: 'createTime', width: 200,height:150 , title: '创建时间', align: 'center'}
                , {fixed: 'right', title: '操作', width: 140,height:150 , align: 'center', toolbar: '#barDemo'}
            ]]
            , page: {
                limit: 5
                , limits: [5, 10, 15, 20]
            }
        });
        table.on('tool(table_image)', function (obj) {
            var data = obj.data;
            if (obj.event === 'view') {
                x_admin_show('原图', '/assets/uploads/' + data.md5+data.type, 600, 400);
            }else if(obj.event === 'set'){

                layer.confirm('确定要设定违规吗？', {icon: 3, title:'提示'}, function(index){
                    $.get('/admin/setyellow?md5='+data.md5);
                    layer.close(index);
                });

            }
        });

        table.on('toolbar(table_image)', function(obj){
            var checkStatus = table.checkStatus(obj.config.id);
            switch(obj.event){
                case 'identify':
                    table.reload('table_image', {
                        url: "/admin/identify"
                    });
                    break;
            };
        });

    });
</script>
</body>

</html>