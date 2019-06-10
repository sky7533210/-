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
    <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
            <input class="layui-input" placeholder="开始日" autocomplete="off" name="start" id="start">
            <input class="layui-input" placeholder="截止日" autocomplete="off" name="end" id="end">
            <button class="layui-btn" lay-submit lay-filter="search"><i class="layui-icon">&#xe615;</i></button>
        </form>
    </div>

    <table class="layui-hide" id="table_file" lay-filter="table_file"></table>

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
            elem: '#table_file'
            , url: "/admin/filelist"
            , method: "POST"
            , cols: [[
                {field: 'id', width: 120, title: 'ID', align: 'center', sort: true}
                , {field: 'md5', width: 300, title: 'MD5', align: 'center'}
                , {field: 'type', minWidth: 120, title: '后缀', align: 'center'}
                , {
                    field: 'size', minWidth: 100, title: '大小', align: 'center', templet: function (d) {
                        if (d.size < 1024)
                            return d.size + "B"
                        else if (d.size < 1024 * 1024)
                            return (d.size / 1024).toFixed(2) + "KB"
                        else
                            return (d.size / 1024 / 1024).toFixed(2) + "MB";
                    }
                }
                , {field: 'createTime', width: 200, title: '创建时间', align: 'center'}
            ]]
            , page: {
                limit: 5
                , limits: [5, 10, 15, 20]
            }
        });


        form = layui.form;
        form.on('submit(search)', function (arg) {
            table.reload('table_file', {
                url: "/admin/filequery"
                , where: arg.field
            });
            return false;
        });
    });
</script>
</body>

</html>