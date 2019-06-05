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
</head>
<body>
<div class="x-body layui-anim layui-anim-up">
    <blockquote class="layui-elem-quote">欢迎管理员：
        <span class="x-red">{{$name}}</span>！当前时间:{{date('y-m-d h:i:s')}}</blockquote>
    <fieldset class="layui-elem-field">
        <legend>数据统计</legend>
        <div class="layui-field-box">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside"
                             lay-arrow="none" style="width: 100%; height: 90px;">
                            <div carousel-item="">
                                <ul class="layui-row layui-col-space10 layui-this">
                                    <li class="layui-col-xs2">
                                        <a href="javascript:;" class="x-admin-backlog-body">
                                            <h3>文件数</h3>
                                            <p>
                                                <cite>{{$data->countfile}}</cite></p>
                                        </a>
                                    </li>
                                    <li class="layui-col-xs2">
                                        <a href="javascript:;" class="x-admin-backlog-body">
                                            <h3>总大小</h3>
                                            <p>
                                                <cite>
                                                    @if($data->totalsize < 1024)
                                                        {{$data->totalsize}}B
                                                    @elseif($data->totalsize < 1024 * 1024)
                                                        {{round(($data->totalsize / 1024), 1)}}KB
                                                    @elseif($data->totalsize < 1024*1024 * 1024)
                                                        {{round(($data->totalsize / 1024 / 1024), 1)}}MB
                                                    @else
                                                        {{round(($data->totalsize / 1024 / 1024/1024), 1)}}GB
                                                    @endif
                                                </cite></p>
                                        </a>
                                    </li>
                                    <li class="layui-col-xs2">
                                        <a href="javascript:;" class="x-admin-backlog-body">
                                            <h3>用户数</h3>
                                            <p>
                                                <cite>{{$data->countuser}}</cite></p>
                                        </a>
                                    </li>
                                    <li class="layui-col-xs2">
                                        <a href="javascript:;" class="x-admin-backlog-body">
                                            <h3>虚拟文件数</h3>
                                            <p>
                                                <cite>{{$data->countvirfile}}</cite></p>
                                        </a>
                                    </li>
                                    <li class="layui-col-xs2">
                                        <a href="javascript:;" class="x-admin-backlog-body">
                                            <h3>虚拟文件总大小</h3>
                                            <p>
                                                <cite>
                                                    @if($data->totalvirsize < 1024)
                                                        {{$data->totalvirsize}}B
                                                    @elseif($data->totalvirsize < 1024 * 1024)
                                                        {{round(($data->totalvirsize / 1024), 1)}}KB
                                                    @elseif($data->totalvirsize < 1024*1024 * 1024)
                                                        {{round(($data->totalvirsize / 1024 / 1024), 1)}}MB
                                                    @else
                                                        {{round(($data->totalvirsize / 1024 / 1024/1024), 1)}}GB
                                                    @endif</cite>
                                            </p>
                                        </a>
                                    </li>
                                    <li class="layui-col-xs2">
                                        <a href="javascript:;" class="x-admin-backlog-body">
                                            <h3>分享总次数</h3>
                                            <p>
                                                <cite>{{$data->countshare}}</cite></p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="layui-elem-field">
        <legend>系统通知</legend>
        <div class="layui-field-box">
            <table class="layui-table" lay-skin="line">
                <tbody>
                <tr>
                    <td>
                        暂无
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </fieldset>
    <fieldset class="layui-elem-field">
        <legend>系统信息</legend>
        <div class="layui-field-box">
            <table class="layui-table">
                <tbody>
                <tr>
                    <th>sky driver版本</th>
                    <td>3.2.5</td>
                </tr>
                <tr>
                    <th>服务器地址</th>
                    <td>www.p.com</td>
                </tr>
                <tr>
                    <th>操作系统</th>
                    <td>WIN10</td>
                </tr>
                <tr>
                    <th>运行环境</th>
                    <td>Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9</td>
                </tr>
                <tr>
                    <th>PHP版本</th>
                    <td>5.4.45</td>
                </tr>
                <tr>
                    <th>PHP运行方式</th>
                    <td>cgi-fcgi</td>
                </tr>
                <tr>
                    <th>MYSQL版本</th>
                    <td>5.5.53</td>
                </tr>
                <tr>
                    <th>mini-frameword</th>
                    <td>5.0.18</td>
                </tr>
                </tbody>
            </table>
        </div>
    </fieldset>
    <fieldset class="layui-elem-field">
        <legend>开发团队</legend>
        <div class="layui-field-box">
            <table class="layui-table">
                <tbody>
                <tr>
                    <th>版权所有</th>
                    <td>xuebingsi(xuebingsi)
                        <a href="http://x.xuebingsi.com/" class='x-a' target="_blank">访问官网</a></td>
                </tr>
                <tr>
                    <th>开发者</th>
                    <td>马志斌(113664000@qq.com)</td>
                </tr>
                </tbody>
            </table>
        </div>
    </fieldset>
    <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本系统由x-admin提供技术支持。</blockquote>
</div>
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>