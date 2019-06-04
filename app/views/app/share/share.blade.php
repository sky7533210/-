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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#collapse-vfm-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:;">sky云盘</a>
        </div>
        <div class="collapse navbar-collapse" id="collapse-vfm-menu">
            <ul class="nav navbar-nav navbar-right">
                @if(session('user'))
                    <li>
                        <a class="edituser" href="#" data-toggle="modal" data-target="#userpanel">
                            <img class="img-circle avatar" width="28px" height="28px"
                                 src="/assets/images/avatars/default.png"/>
                            <span class="hidden-sm">
                            <strong>{{session('user')->username}}</strong>
                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="/">
                        <span class="hidden-sm">
                            <strong>主页</strong>
                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="/logout">
                            <i class="fa fa-sign-out fa-fw"></i>
                            <span class="hidden-sm">登出</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="/login?url={{$url}}">
                        <span class="hidden-sm">
                            <strong> <i class="fa fa-sign-in"></i> 登入</strong>
                        </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<header class="vfm-header">
    <div class="container">
        <div class="head-banner text-center">
            <a href="javascript:;">
                <img alt="乌云极简云盘" src="/assets/images/logo.png">
            </a>
        </div>
    </div> <!-- .container -->
</header>
<div class="container">
    <div id="error" style="display: none;">
        <div class="alert-wrap ">
            <div class="response yep alert" role="alert">
                <span id="tiperrortext"><i class="fa fa-check-circle"></i></span>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
    <div class="main-content">
        {{$sharename}} 分享的文件
        <section class="vfmblock tableblock ghost">
            <div class="action-group">
                <div class="btn-group">
                    <button class="btn btn-default manda downloadss">
                        <i class="fa fa-save"></i>
                        保存到我的网盘
                    </button>
                </div> <!-- .btn-group -->
                <button class="btn btn-default manda multic">
                    <i class="fa fa-paper-plane"></i>
                    下载
                </button>
            </div> <!-- .action-group -->

            <form id="tableform">
                <table class="table " width="100%" id="sort">
                    <thead>
                    <tr class="rowa one">
                        <td class="text-center">
                            <a href="#" title="选择所有" id="selectall">
                                <i class="fa fa-check fa-lg"></i>
                            </a>
                        </td>
                        <td class="mini h-filename">
                            <span class="visible-xs sorta nowrap">
                                <i class="fa fa-sort-alpha-asc"></i>
                            </span>
                            <span class="hidden-xs sorta nowrap">
                                文件名                          </span>
                        </td>
                        <td class="taglia reduce mini h-filesize hidden-xs">
                            <span class="text-center sorta nowrap">
                                大小                            </span>
                        </td>
                        <td class="reduce mini h-filedate hidden-xs">
                            <span class="text-center nowrap">
                                失效时间                            </span>
                        </td>
                        <td class="mini text-center gridview-hidden hidden-xs">
                            <i class="fa fa-save"></i>
                        </td>
                        <td class="mini text-center gridview-hidden">
                            <i class="fa fa-cloud-download hidden-xs"></i>
                            <i class="fa fa-cogs visible-xs"></i>
                        </td>
                    </tr>
                    </thead>
                    <tbody class="gridbody">


                    @foreach($files as $file)
                        <tr class="rowa">
                            <td class="checkb text-center">
                                <div class="checkbox checkbox-primary checkbox-circle">
                                    <label class="round-butt">
                                        <input type="checkbox" name="selecta" class="selecta"
                                               value="{{$file->id}}">
                                    </label>
                                </div>
                            </td>
                            <td class="name" data-order="{{ $file->name }}" data-filter="{{ $file->name }}">
                                <div class="relative">
                                    <i class="fa {{key_exists($file->type,$fa)? $fa[$file->type]:'fa-file-o'}} fa-2x"></i> {{$file->name}}
                                </div>
                            </td>

                            <td class="mini reduce nowrap hidden-xs" data-order="{{$file->size}}">
                                <span class="text-center">
                                    @if($file->size < 1024)
                                        {{$file->size}}B
                                    @elseif($file->size < 1024 * 1024)
                                        {{round(($file->size / 1024), 2)}}KB
                                    @else
                                        {{round(($file->size / 1024 / 1024), 2)}}MB
                                    @endif
                                </span>
                            </td>
                            <td class="mini reduce hidden-xs nowrap">
                                <span class="text-center">
                                  <?php
                                    $time = strtotime($endtime) - time();
                                    if ($time > 24 * 3600)
                                        echo round($time / 24 / 3600) . '天';
                                    else if ($time > 3600)
                                        echo round($time / 3600) . '小时';
                                    else echo round($time / 60) . '分钟';
                                    ?>
                                </span>
                            </td>
                            @if(session('user'))
                                <td class="icon text-center hidden-xs save">
                                    <a class="round-butt butt-mini" data-id="{{$file->id}}"
                                       href="javascript:;" title="保存到我的网盘">
                                        <i class="fa fa-save"></i>
                                    </a>
                                </td>
                            @else
                                <td class="icon text-center hidden-xs logina">
                                    <a class="round-butt butt-mini"
                                       href="javascript:;" title="保存到我的网盘">
                                        <i class="fa fa-save"></i>
                                    </a>
                                </td>
                            @endif
                            <td class="text-center">
                                <div class="del hidden-xs">
                                    <a class="round-butt butt-mini" data-name="{{$file->name}}"
                                       href="/share/download/{{base64_encode($file->id)}}?keyw={{$keyw}}"
                                       title="下载">
                                        <i class="fa fa-cloud-download"></i>
                                    </a>
                                </div>
                                <div class="dropdown visible-xs">
                                    <a class="round-butt butt-mini dropdown-toggle" data-toggle="dropdown" href="#"
                                    >
                                        <i class="fa fa-cog"></i>
                                    </a>
                                    <!--手机模式时出现-->
                                    <ul class="dropdown-menu dropdown-menu-right">

                                        @if(session('user'))
                                            <li class="save">
                                                <a href="javascript:;"
                                                   data-id="{{$file->id}}" title="保存到我的网盘">
                                                    <i class="fa fa-save"></i>
                                                    保存 </a>
                                            </li>
                                        @else
                                            <li class="logina">
                                                <a href="javascript:;"
                                                   data-id="{{$file->id}}" title="保存到我的网盘">
                                                    <i class="fa fa-save"></i>
                                                    保存 </a>
                                            </li>
                                        @endif

                                        <li class="del">
                                            <a href="/share/download/{{base64_encode($file->id)}}?keyw={{$keyw}}"
                                               data-name="{{$file->name}}" title="下载">
                                                <i class="fa fa-cloud-download"></i>
                                                下载 </a>
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
        <span class="pull-left"><a href="javascript:;" target="_blank">
            sky云网 </a>
            © 2019        </span>
    </div>
</footer>
<script src="/assets/js/jquery-1.12.4.min.js"></script>
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/datatables.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script>
    setupDelete(
        "你将要下载这个文件",
        "你将要下载这些文件",
        true,
        123,
        "cf1c355d8e28c8ebeabf6b5dab20ea07",
        "/share/cancle",
        "请至少选择一个文件");
    setupDownloads("{{$keyw}}");
    @if(session('user'))
        setupSave(true,
        "请至少选择一个文件",
        "123",
        "cf1c355d8e28c8ebeabf6b5dab20ea07",
        18686983320);
    @else
        setupLogin("{{$url}}");
    @endif
</script>
@if(session('user'))
    <div class="modal fade movefiles" id="movemulti" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="fa fa-list"></i>
                        选择目标文件夹 </h4>
                </div>
                <div class="modal-body">
                    <div class="hiddenalert"></div>

                    <ul class="foldertree">
                        <li class="folderoot">

                        <li><a href='#' data-dest='0' class='movelink'><i
                                        class='fa fa-folder-o'></i>根目录</a>
                            <?php
                            function getChild($next)
                            {
                                echo "<ul>";
                                foreach ($next as $value) {
                                    echo "<li><a href='#' data-dest='$value->id' class='movelink' ><i
                                            class='fa fa-folder-o'></i>$value->name</a>";
                                    if ($value->next) {
                                        getChild($value->next);
                                    }
                                    echo '</li>';
                                }
                                echo '</ul>';
                            }
                            getChild($folderTree);

                            ?>

                        </li>
                    </ul>
                    <form id="moveform">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
</body>
</html>