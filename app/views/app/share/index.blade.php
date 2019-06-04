<!DOCTYPE HTML>
<html>
<head>
    <title>Sky云盘</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you View the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.min.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->

    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>


    <link rel="stylesheet" href="/assets/css/vfm-style.css">
    <link rel="stylesheet" href="/assets/skins/vfm-2016.css">

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-vfm-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:;" draggable="false">sky云盘</a>
        </div>
        <div class="collapse navbar-collapse" id="collapse-vfm-menu">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="edituser" href="#" data-toggle="modal" data-target="#userpanel" draggable="false">
                        <img class="img-circle avatar" width="28px" height="28px" draggable="false"
                             src="/assets/images/avatars/default.png"/>
                        <span class="hidden-sm">
                            <strong>{{$username}}</strong>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/" draggable="false">
                        <span class="hidden-sm">
                            <strong>主页</strong>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/grabage" draggable="false">
                        <span class="hidden-sm">
                            <strong>回收站</strong>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/logout" draggable="false">
                        <i class="fa fa-sign-out fa-fw"></i>
                        <span class="hidden-sm">登出</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/assets/js/jquery-1.12.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>

<script src="/assets/js/avatars.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        Avatars('/assets/images/avatars/default.png', '/assets/images/avatars/default.png');
    });
</script>


<header class="vfm-header">
    <div class="container">
        <div class="head-banner text-center">
            <a href="javascript:;" draggable="false">
                <img alt="sky云盘" src="/assets/images/logo.png" draggable="false">
            </a>
        </div>
    </div> <!-- .container -->
</header>

<div class="container">

    @if(session('share'))
    <div id="error">
        <div class="alert-wrap ">
            <div class="response yep alert" role="alert">
                <span id="tiperrortext"><i class="fa fa-check-circle"></i> {{flash('share')}} </span>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    <div class="main-content">

        <p>我分享过的文件</p>
        <section class="vfmblock tableblock ghost ghost-hidden">
            <div class="action-group">
                <div class="btn-group">
                    <button class="btn btn-default manda multic">
                        <i class="fa fa-cog"></i>
                        取消分享
                    </button>
                </div> <!-- .btn-group -->
            </div> <!-- .action-group -->

            <form id="tableform">
                <table class="table " width="100%" id="sort">
                    <thead>
                    <tr class="rowa one">
                        <td class="text-center">
                            <a href="#" title="选择所有" id="selectall" draggable="false">
                                <i class="fa fa-check fa-lg"></i>
                            </a>
                        </td>
                        <td class="mini h-filename">
                        <span class="visible-xs sorta nowrap">
                            <i class="fa fa-sort-alpha-asc"></i>
                        </span>
                            <span class="sorta nowrap hidden-xs">
                            文件名                            </span>
                        </td>
                        <td class="taglia reduce mini h-filesize hidden-xs">
                        <span class="text-center sorta nowrap">
                            浏览数                           </span>
                        </td>
                        <td class="reduce mini h-filesize hidden-xs">
                        <span class="text-center sorta nowrap">
                            保存数                            </span>
                        </td>
                        <td class="reduce mini h-filesize hidden-xs">
                        <span class="text-center sorta nowrap">
                            下载数</span>
                        </td>
                        <td class="reduce mini h-filedate hidden-xs">
                        <span class="text-center sorta nowrap">
                            分享时间</span>
                        </td>
                        <td class="reduce mini h-filesize hidden-xs">
                        <span class="text-center sorta nowrap">
                            有效期</span>
                        </td>
                        <td class="reduce mini h-filesize">
                        <span class="text-center nowrap">
                            提取码</span>
                        </td>
                        <td class="reduce mini h-filesize">
                        <span class="text-center nowrap">
                            链接地址</span>
                        </td>
                        <td class="mini text-center gridview-hidden">
                            <i class="fa fa-trash-o"></i>
                        </td>
                    </tr>
                    </thead>
                    <tbody class="gridbody">


                    @foreach($shares as $share)
                        <tr class="rowa">
                            <td class="checkb text-center">
                                <div class="checkbox checkbox-primary checkbox-circle">
                                    <label class="round-butt">
                                        <input type="checkbox" name="selecta" class="selecta"
                                               value="{{ $share->id }}">
                                    </label>
                                </div>
                            </td>
                            <td class="name" data-order="{{ $share->name }}" data-filter="{{ $share->name }}">
                                <div class="relative">
                                    {{ $share->name }}
                                </div>
                            </td>

                            <td class="mini nowrap hidden-xs" data-order="{{$share->views}}">
                            <span class="text-center">
                              {{$share->views}}
                            </span>
                            </td>

                            <td class="mini nowrap hidden-xs" data-order="{{$share->saves}}">
                            <span class="text-center">
                              {{$share->saves}}
                            </span>
                            </td>

                            <td class="mini nowrap hidden-xs" data-order="{{$share->downloads}}">
                            <span class="text-center">
                              {{$share->downloads}}
                            </span>
                            </td>

                            <td class="mini hidden-xs nowrap" data-order="{{ $share->start_time}}">
                            <span class="text-center">
                              {{ $share->start_time}}
                            </span>
                            </td>

                            <td class="mini hidden-xs nowrap" data-order="{{ $share->end_time}}">
                            <span class="text-center">
                                <?php
                                $time = strtotime($share->end_time) - time();
                                if($time>0)
                                    if ($time > 24 * 3600)
                                        echo round($time / 24 / 3600) . '天';
                                    else if ($time > 3600)
                                        echo round($time / 3600) . '小时';
                                    else echo round($time / 60) . '分钟';
                                else
                                    echo '已失效';
                                ?>
                            </span>
                            </td>

                            <td class="mini nowrap" data-order="{{ $share->password}}">
                            <span class="text-center">
                              {{ $share->password}}
                            </span>
                            </td>

                            <td class="mini nowrap" data-order="{{ $share->url}}">
                            <span class="text-center">
                              {{ $share->url}}
                            </span>
                            </td>

                            <td class="icon text-center">
                                <div class="del">
                                    <a class="round-butt butt-mini" data-name="{{$share->name}}"
                                       href="/share/cancle?ids={{$share->id}}" draggable="false" title="取消分享">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </form>


        </section>
    </div> <!-- .main-content -->
</div> <!-- .container -->
<footer class="footer">
    <div class="container">
        <span class="pull-left">Sky云网&copy;2019</span>
    </div>
</footer>

<div class="modal fade deletemulti" id="deletemulti" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <p class="modal-title">
                    已经选择的文件:
                    <span class="numfiles badge badge-danger"></span>
                </p>
            </div>
            <div class="text-center modal-body">
                <form id="delform">
                    <a class="btn btn-primary btn-lg centertext bigd removelink" href="#" draggable="false">
                        <i class="fa fa-trash-o fa-5x"></i></a>
                    <p class="delresp"></p>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/datatables.min.js"></script>
<script>
    setupDelete(
        "你将取消分享这个文件",
        "你将取消分享这些文件",
        true,
        123,
        "cf1c355d8e28c8ebeabf6b5dab20ea07",
        "/share/cancle",
        "请至少选择一个文件");
</script>
</body>
</html>