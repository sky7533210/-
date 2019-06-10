<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>后台登录-X-admin2.0</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="/assets/css/font.css">
        <link rel="stylesheet" href="/assets/css/xadmin.css">
    </head>
    <body>
        <div id="main" style="width: 100%;height: 400px"></div>
        <div id="main1" style="width: 100%;height: 400px"></div>
        <script src="/assets/js/echarts.min.js" charset="utf-8"></script>
        <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '上周每日注册人数'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['人数']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['周一','周二','周三','周四','周五','周六','周日']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'人数',
                    type:'line',
                    stack: '总量',
                    data:{{$data}}
                }
            ]
        };


        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);

        var myChart1 = echarts.init(document.getElementById('main1'));

        // 指定图表的配置项和数据
        var option1 = {
            title: {
                text: '昨日每2小时注册人数'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['人数']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['0时','2时','4时','6时','8时','10时','12时','14时','16时','18时','20时','22时']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'人数',
                    type:'line',
                    stack: '总量',
                    data:{{$data1}}
                }
            ]
        };


        // 使用刚指定的配置项和数据显示图表。
        myChart1.setOption(option1);
    </script>
    </body>
</html>