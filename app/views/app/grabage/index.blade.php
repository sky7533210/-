<!DOCTYPE HTML>
<html>
<head>
    <title>sky drive回收站</title>

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
            <a class="navbar-brand" href="javascript:;" draggable="false">sky drive</a>
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
                    <a href="/share" draggable="false">
                        <span class="hidden-sm fa fa-share-alt">
                            <strong>我的分享</strong>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/" draggable="false">
                        <span class="hidden-sm fa fa-home">
                            <strong>主页</strong>
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

    @if(session('grabage'))
        <div id="error">
            <div class="alert-wrap ">
                <div class="response yep alert" role="alert">
                    <span id="tiperrortext"><i class="fa fa-check-circle"></i> {{flash('grabage')}} </span>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="main-content">
        <p> <i class="fa fa-trash"></i> 回收站</p>
        <section class="vfmblock tableblock ghost ghost-hidden">
            <div class="action-group">
                <div class="btn-group">
                    <button class="btn btn-default manda restore1">
                        <i class="fa fa-undo"></i>
                        还原文件
                    </button>
                </div> <!-- .btn-group -->
                <button class="btn btn-default manda multic">
                    <i class="fa fa-trash-o"></i>
                    永久删除
                </button>
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
                            <span class="visible-xs ">
                                <i class="fa fa-sort-alpha-asc"></i>
                            </span>
                            <span><i class="fa fa-file-o"> 文件名</i></span>
                        </td>
                        <td class="taglia reduce mini h-filesize hidden-xs">
                            <span><i class="fa fa-adn"> 大小</i></span>
                        </td>
                        <td class="reduce mini h-filedate hidden-xs">
                            <span><i class="fa fa-calendar"> 删除时间</i></span>

                        </td>
                        <td class="reduce mini h-filedate hidden-xs">
                            <span><i class="fa fa-calendar-times-o"> 有效期</i></span>
                        </td>
                        <td class="mini text-center gridview-hidden hidden-xs">
                            <i class="fa fa-undo"> 还原</i>
                        </td>
                        <td class="mini text-center gridview-hidden">
                            <i class="fa fa-trash-o hidden-xs"> 删除</i>
                            <i class="fa fa-cogs visible-xs"></i>
                        </td>
                    </tr>
                    </thead>
                    <tbody class="gridbody">


                    @foreach($grabages as $grabage)
                        <tr class="rowa">
                            <td class="checkb text-center">
                                <div class="checkbox checkbox-primary checkbox-circle">
                                    <label class="round-butt">
                                        <input type="checkbox" name="selecta" class="selecta"
                                               value="{{ $grabage->id }}">
                                    </label>
                                </div>
                            </td>
                            <td class="name" data-order="{{ $grabage->name }}" data-filter="{{ $grabage->name }}">
                                <div class="relative">
                                    {{ $grabage->name }}
                                </div>
                            </td>

                            <td class="mini reduce nowrap hidden-xs" data-order="{{$grabage->size}}">
                                <span class="text-center">
                                    @if($grabage->size=='')
                                   @elseif($grabage->size < 1024)
                                        {{$grabage->size}}B
                                    @elseif($grabage->size < 1024 * 1024)
                                        {{round(($grabage->size / 1024), 2)}}KB
                                    @else
                                        {{round(($grabage->size / 1024 / 1024), 2)}}MB
                                    @endif
                                </span>
                            </td>

                            <td class="mini reduce hidden-xs nowrap" data-order="{{$grabage->del_time}}">
                                <span class="text-center">
                                    {{ $grabage->del_time }}</span>
                            </td>
                            <td class="mini reduce hidden-xs nowrap" data-order="{{$grabage->del_time}}">
                                <span class="text-center">
                                  <?php
                                    $time = strtotime('+7 day', strtotime($grabage->del_time)) - time();
                                        if ($time > 24 * 3600)
                                            echo round($time / 24 / 3600) . '天';
                                        else if ($time > 3600)
                                            echo round($time / 3600) . '小时';
                                        else echo round($time / 60) . '分钟'
                                    ?>
                                </span>
                            </td>

                            <td class="icon restore text-center hidden-xs">
                                <a class="round-butt butt-mini" data-name="{{$grabage->name}}"
                                   href="/grabage/restore?ids={{$grabage->id}}" draggable="false" title="还原">
                                    <i class="fa fa-undo"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="del hidden-xs">
                                    <a class="round-butt butt-mini" data-name="{{$grabage->name}}"
                                       href="/grabage/delete?ids={{$grabage->id}}" draggable="false" title="永久删除">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                                <div class="dropdown visible-xs">
                                    <a class="round-butt butt-mini dropdown-toggle" data-toggle="dropdown" href="#"
                                       draggable="false">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                    <!--手机模式时出现-->
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="/grabage/delete?ids={{$grabage->id}}"
                                               data-name="{{$grabage->name}}" draggable="false" title="还原">
                                                <i class="fa fa-undo"></i>
                                                还原 </a>
                                        </li>
                                        <li class="del">
                                            <a href="/grabage/delete?ids={{$grabage->id}}&parentid={{$parentid}}"
                                               data-name="{{$grabage->name}}" draggable="false" title="永久删除">
                                                <i class="fa fa-trash-o"></i>
                                                删除 </a>
                                        </li>
                                    </ul>
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
        <span class="pull-left"><a href="javascript:;">
            华东交通大学理工学院 rg2016-4</a>
            &copy; 2019</span>
    </div>
</footer>
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/datatables.min.js"></script>

<script type="text/javascript">
    setupDelete(
        "你将永久删除这个文件",
        "你将永久删除这个文件",
        true,
        123,
        "cf1c355d8e28c8ebeabf6b5dab20ea07",
        "/grabage/delete",
        "请至少选择一个文件");

    setupRestore(
        "你将还原这个文件",
        "你将还原这些文件",
        true,
        123,
        "cf1c355d8e28c8ebeabf6b5dab20ea07",
        "/grabage/restore",
        "请至少选择一个文件");
</script>

<!--多选删除模态框-->
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

<link href="/assets/js/videojs/video-js.min.css" rel="stylesheet">
<script src="/assets/js/videojs/video.min.js"></script>
</body>
</html>