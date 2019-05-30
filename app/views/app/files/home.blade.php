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
<body id="uparea" class="vfm-body inlinethumbs">
<div class="overdrag"></div>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
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
                    <a href="/file/myshare" draggable="false">
                        <span class="hidden-sm">
                            <strong>我的分享</strong>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/file/grabage" draggable="false">
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

<!-- 添加用户修改的页面-->
<?php require_once 'userModify.php'?>


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

    <div id="error" style="display: none;">
        <div class="alert-wrap ">
            <div class="response yep alert" role="alert">
                <span id="tiperrortext"><i class="fa fa-check-circle"></i> 数字.txt </span>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>

    <div class="main-content">


        <!-- 上传输入框 =================================================================================================-->
        <section class="vfmblock uploadarea">
            <form enctype="multipart/form-data" method="post" id="upForm" action="/index.php">
                <input type="hidden" name="location" value="./uploads/">
                <div id="upload_container" class="input-group pull-left span-6">
                <span class="input-group-addon ie_hidden">
                    <i class="fa fa-files-o fa-fw"></i>
                </span>
                    <span class="input-group-btn" id="upload_file">
                    <span class="upfile btn btn-primary btn-file">
                        <i class="fa fa-files-o fa-fw"></i>
                        <input name="userfile[]" type="file" class="upload_file" multiple/>
                    </span>
                </span>
                    <input class="form-control" type="text" readonly name="fileToUpload" id="fileToUpload"
                           onchange="fileSelected();" placeholder="选择上传文件">
                    <span class="input-group-btn">
                    <button class="upload_sumbit btn btn-primary" type="submit" id="upformsubmit" disabled>
                        <i class="fa fa-upload fa-fw"></i>
                    </button>
                    <a href="javascript:;" class="btn btn-primary" id="upchunk" draggable="false">
                        <i class="fa fa-upload fa-fw"></i>
                    </a>
                </span>
                </div>
            </form>

            <script type="text/javascript" src="/assets/js/spark-md5.min.js"></script>
            <script type="text/javascript" src="/assets/js/md5file.js"></script>
            <script type="text/javascript" src="/assets/js/uploaders.js"></script>
            <script type="text/javascript">
                resumableJsSetup(
                    "no",
                    "选择上传文件",
                    0, "{{$parentid}}");
            </script>
            <form enctype="multipart/form-data" method="post" action="/file/createdir">
                <div id="newdir_container" class="input-group pull-right span-6">
                    <span class="input-group-addon"><i class="fa fa-folder-open-o fa-fw"></i></span>
                    <input name="parentid" type="hidden" value="{{$parentid}}"/>
                    <input name="userdir" type="text" class="upload_dirname form-control"
                           placeholder="创建目录"/>
                    <span class="input-group-btn">
                    <button class="btn btn-primary upfolder" type="submit">
                        <i class="fa fa-plus fa-fw"></i>
                    </button>
                </span>
                </div>
            </form>
            <div class="intero fullp">
                <div class="progress progress-striped active" id="progress-up">
                    <div class="upbar progress-bar progress-bar-success"
                         role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <p class="pull-left propercent"></p>
                    </div>
                </div>
            </div>
        </section>


        <ol class="breadcrumb">
            <li>
                <a href="/home?parentid=0" draggable="false">
                    <i class="fa fa-folder-open"></i>根目录</a>
            </li>

            @foreach($paths as $path)
                <li>
                    <a href="/home?parentid={{$path->id}}" draggable="false">
                        <i class="fa fa-folder-open"></i>{{$path->name}}</a>
                </li>
            @endforeach


        </ol>


        <!-- 文件夹表格================================================================================================-->
        <section class="vfmblock tableblock ghost ghost-hidden">
            <table class="table" width="100%" id="sortable">
                <thead>
                <tr class="rowa two">
                    <td></td>
                    <td class="mini"><span class="sorta nowrap"><i class="fa fa-sort-alpha-asc"></i></span></td>
                    <td class="mini hidden-xs"><span class="sorta nowrap"><i class="fa fa-calendar"></i></span></td>
                    <td class="mini text-center visible-xs">
                        <i class="fa fa-cogs"></i>
                    </td>
                    <!--
                    <td class="mini text-center">
                        <i class="fa fa-download hidden-xs"></i>
                    </td>
                    -->
                    <td class="mini text-center hidden-xs">
                        <i class="fa fa-pencil"></i>
                    </td>
                    <td class="mini text-center hidden-xs">
                        <i class="fa fa-trash-o"></i>
                    </td>
                </tr>
                </thead>
                <tbody>


                @foreach($dirs as $dir)
                    <tr class="rowa">
                        <td></td>
                        <td class="name" data-order="{{ $dir->name }}">
                            <div class="relative">
                                <a class="full-lenght" href="/home?parentid={{$dir->id}}" draggable="false">
                                        <span class="icon text-center">
                                            <i class="fa fa-folder fa-lg fa-fw"></i>{{ $dir->name }}</span>
                                </a>
                                <span class="hover">
                                        <i class="fa fa-folder-open-o fa-fw"></i>
                                    </span>
                            </div>
                        </td>
                        <td class="hidden-xs mini reduce nowrap" data-order="1557248511">
                            {{ $dir->create_time }}
                        </td>
                        <td class="text-center visible-xs">
                            <div class="dropdown">
                                <a class="round-butt butt-mini dropdown-toggle" data-toggle="dropdown" href="#"
                                   draggable="false">
                                    <i class="fa fa-cog"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="rename">
                                        <a href="javascript:void(0)"
                                           data-thisdir="{{$parentid}}"
                                           data-thisname="aaa" data-thisid="{{$dir->id}}" draggable="false">
                                            <i class="fa fa-edit"></i>
                                            重命名 </a>
                                    </li>
                                    <li class="del">
                                        <a href="javascript:;"
                                           data-name="{{$dir->name}}" draggable="false">
                                            <i class="fa fa-trash-o"></i>
                                            删除 </a>
                                    </li>
                                </ul>
                            </div>
                        </td>

                        <!-- 下载按钮
                        <td class="text-center">
                            <a class="round-butt butt-mini zipdir hidden-xs"
                               data-zip="Li91cGxvYWRzL2FhYQ=="
                               data-dash="76a159b49d81f014acf86c57b381e2dd" href="javascript:void(0)"
                               data-thisname="aaa" draggable="false">
                                <i class="fa fa-cloud-download"></i>
                            </a>
                        </td>-->

                        <td class="text-center hidden-xs">
                            <div class="rename">
                                <a class="round-butt butt-mini" href="javascript:void(0)"
                                   data-thisdir="{{$parentid}}"
                                   data-thisname="{{$dir->name}}" data-thisid="{{$dir->id}}" draggable="false">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </div>
                        </td>
                        <td class="del text-center hidden-xs">
                            <a class="round-butt butt-mini" data-name="{{$dir->name}}"
                               href="/file/delete?id={{$dir->id}}&parentid={{$parentid}}" draggable="false">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </section>


        <section class="vfmblock tableblock ghost ghost-hidden">
            <div class="action-group">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle groupact" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                        更多操作
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="multid" href="#" draggable="false">
                                <i class="fa fa-cloud-download"></i>
                                下载</a>
                        </li>
                        <li>
                            <a class="multimove" href="#" draggable="false">
                                <i class="fa fa-arrow-right"></i>
                                移动 </a>
                        </li>
                        <li>
                            <a class="multicopy" href="#" draggable="false">
                                <i class="fa fa-files-o"></i>
                                复制 </a>
                        </li>
                        <li><a class="multic" href="#" draggable="false">
                                <i class="fa fa-trash-o"></i>
                                删除 </a>
                        </li>
                    </ul>
                </div> <!-- .btn-group -->
                <button class="btn btn-default manda">
                    <i class="fa fa-paper-plane"></i>
                    分享链接
                </button>
                <div class="switchview pull-right " title="切换视图"></div>
            </div> <!-- .action-group -->


            <!-- 文件表格================================================================================================-->
            <form id="tableform">
                <table class="table " width="100%" id="sort">
                    <thead>
                    <tr class="rowa one">
                        <td class="text-center">
                            <a href="#" title="选择所有" id="selectall" draggable="false">
                                <i class="fa fa-check fa-lg"></i>
                            </a>
                        </td>
                        <td class="icon"></td>
                        <td class="mini h-filename">
                            <span class="visible-xs sorta nowrap">
                                <i class="fa fa-sort-alpha-asc"></i>
                            </span>
                            <span class="hidden-xs sorta nowrap">
                                文件名                            </span>
                        </td>
                        <td class="taglia reduce mini h-filesize hidden-xs">
                            <span class="text-center sorta nowrap">
                                文件大小                            </span>
                        </td>
                        <td class="reduce mini h-filedate hidden-xs">
                            <span class="text-center sorta nowrap">
                                最后修改                            </span>
                        </td>
                        <td class="mini text-center gridview-hidden hidden-xs">
                            <i class="fa fa-pencil"></i>
                        </td>
                        <td class="mini text-center gridview-hidden">
                            <i class="fa fa-trash-o hidden-xs"></i>
                            <i class="fa fa-cogs visible-xs"></i>
                        </td>
                    </tr>
                    </thead>
                    <tbody class="gridbody">


                    @foreach($files as $file)
                        <tr class="rowa <?php if (in_array($file->type, $imgs)) echo 'gallindex'; ?>">
                            <td class="checkb text-center">
                                <div class="checkbox checkbox-primary checkbox-circle">
                                    <label class="round-butt">
                                        <input type="checkbox" name="selecta" class="selecta"
                                               value="{{ $file->id }}">
                                    </label>
                                </div>
                            </td>
                            <td class="icon text-center itemicon <?php if (in_array($file->type, $sounds)) echo 'playme' ?> ">

                                <a <?php if (in_array($file->type, $sounds)) echo 'type="audio/mp3"' ?> href="<?php if (in_array($file->type, $sounds))
                                    echo '/file/download/' . base64_encode($file->id); else echo 'javascript:;'; ?> "
                                   <?php
                                   if (in_array($file->type, $sounds))
                                       echo 'class="sm2_button"';
                                   else {
                                       if (in_array($file->type, $movies)) echo 'class="item file vid"';
                                       else if (in_array($file->type, $imgs)) echo 'class="item file thumb vfm-gall"';
                                       else echo 'class="item file"';
                                   }?>
                                   draggable="false"
                                   <?php if (in_array($file->type, $ims)) echo 'data-ext="' . substr($file->type, 1) . '"' .
                                       'data-name="' . $file->name . '" data-link="/file/download/' . base64_encode($file->id) . '"' . 'data-linkencoded="fdaf12=="'?>   draggable="false">

                                    <div class="icon-placeholder">
                                        <?php  if (in_array($file->type, $imgs)) {
                                            echo '<img src="/file/download/' . base64_encode($file->id) . '" draggable="false" >';
                                        } else {
                                            if (in_array($file->type, $sounds))
                                                echo '<div class="cta"><i class="trackload fa fa-refresh fa-spin fa-lg"></i>
                                                <i class="trackpause fa fa-play-circle-o fa-lg"></i>
                                                <i class="trackplay fa fa-circle-o-notch fa-spin fa-lg"></i>
                                                <i class="trackstop fa fa-play-circle fa-lg"></i></div>';
                                            else
                                                echo '<div class="cta"><i class="fa ' . (key_exists($file->type,$fa)? $fa[$file->type]:'fa-file-o') . ' fa-lg"></i></div>';
                                        } ?>
                                    </div>
                                    <div class="hover">
                                        <div>
                                            <div class="round-butt">
                                                <i class="fa fa-download fa-fw"></i>
                                            </div>
                                            <br>
                                            <span class="badge">
                                                <strong>
                                                    {{ $file->size}}                                            </strong>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </td>

                            <td class="name" data-order="{{ $file->name }}" data-filter="{{ $file->name }}">
                                <div class="relative">
                                    <a href="/file/download/{{base64_encode($file->id)}}?a=dl"
                                       class="full-lenght item file" draggable="false">{{ $file->name }}</a>
                                    <div class="grid-item-title">{{ $file->name }}</div>

                                    <span class="hover"><i class="fa fa-download fa-fw"></i></span><!--下载按钮-->
                                </div>
                            </td>

                            <td class="mini reduce nowrap hidden-xs" data-order="6104">
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

                            <td class="mini reduce hidden-xs nowrap" data-order="1557248519">
                                <span class="text-center">
                                    {{ $file->create_time }}                            </span>
                            </td>

                            <td class="icon rename text-center hidden-xs">
                                <a class="round-butt butt-mini" href="javascript:;" data-thisdir="{{$parentid}}"
                                   data-thisext="" data-thisname="{{$file->name}}" data-thisid="{{$file->id}}"
                                   draggable="false">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="del hidden-xs">
                                    <a class="round-butt butt-mini" data-name="{{$file->name}}"
                                       href="/file/delete?id={{$file->id}}&parentid={{$parentid}}" draggable="false">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                                <div class="dropdown visible-xs">
                                    <a class="round-butt butt-mini dropdown-toggle" data-toggle="dropdown" href="#"
                                       draggable="false">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="download/dXBsb2Fkcy9jb25maWcuanNvbg==/h/730b995353a85ab8306d8e91cbda2e17"
                                               draggable="false">
                                                <i class="fa fa-cloud-download"></i>
                                                下载 </a>
                                        </li>
                                        <li class="rename">
                                            <a href="javascript:void(0)"
                                               data-thisdir="{{$file->parentid}}"
                                               data-thisname="{{$file->name}}" data-thisid="{{$file->id}}"
                                               draggable="false">
                                                <i class="fa fa-edit"></i>
                                                重命名 </a>
                                        </li>
                                        <li class="del">
                                            <a href="/file/delete"
                                               data-name="{{$file->name}}" draggable="false">
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
        <span class="pull-left">Sky云网&copy;2019</span>
    </div>
</footer>
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        callFoldersTable(
            "simple",
            10,
            2,
            "desc",
            "off");
        callBindZip('您将要下载整个文件夹');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        callFilesTable(
            "full_numbers",
            true,
            true,
            10,
            4,
            "desc");
    });
</script>


<a type="audio/mp3" class="sm2_button hidden" href="#"></a>
<script src="/assets/js/soundmanager2.min.js"></script>

<script type="text/javascript">
    createShareLink(
        "请插入至少4个字符，或留空得到一个随机密码",
        1557248610,
        "cf1c355d8e28c8ebeabf6b5dab20ea07",
        "http:\/\/www.p.com",
        true,
        2000,
        "请至少选择一个文件",
        "无法一次下载过多文件：",
        true);
</script>


<!--多下载模态框-->
<div class="modal fade downloadmulti" id="downloadmulti" tabindex="-1">
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
                <a class="btn btn-primary btn-lg centertext bigd sendlink" href="#" draggable="false">
                    <i class="fa fa-cloud-download fa-5x"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!--分享链接模态框-->
<div class="modal fade sendfiles" id="sendfilesmodal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h5 class="modal-title">
                    已经选择的文件:
                    <span class="numfiles badge badge-danger"></span>
                </h5>
            </div>

            <div class="modal-body">
                <div class="form-group createlink-wrap">
                    <button id="createlink" class="btn btn-primary btn-block"><i class="fa fa-check"></i>
                        生成链接
                    </button>
                </div>

                <div class="form-group time">
                    <label>
                        有效期：
                    </label>
                    <label>
                        <input name="limittime" type="radio" value="1" checked>
                        1天
                    </label>
                    <label>
                        <input name="limittime" type="radio" value="2">
                        7天
                    </label>
                    <label>
                        <input name="limittime" type="radio" value="3">
                        永久
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input id="use_pass" name="use_pass" type="checkbox"><i class="fa fa-key"></i>
                        设置保护密码 </label>
                </div>
                <div class="form-group shalink">
                    <div class="input-group">
                                <span class="input-group-btn">
                                    <a class="btn btn-primary sharebutt" href="#" target="_blank">
                                        <i class="fa fa-link fa-fw"></i>
                                    </a>
                                </span>
                        <input id="copylink" class="sharelink form-control" type="text" onclick="this.select()"
                               readonly>
                        <span class="input-group-btn">
                                    <button id="clipme" class="clipme btn btn-primary"
                                            data-toggle="popover" data-placement="bottom"
                                            data-content="复制"
                                            data-clipboard-target="#copylink">
                                        <i class="fa fa-clipboard fa-fw"></i>
                                    </button>
                                </span>
                    </div>
                </div>
                <div class="form-group seclink">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                        <input class="form-control passlink setpass" type="text" onclick="this.select()"
                               placeholder="留空则生成随机密码">
                    </div>
                </div>
            </div> <!-- modal-body -->
        </div>
    </div>
</div>


<!--重命名模态框-->
<div class="modal fade changename" id="modalchangename" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> 重命名</h4>
            </div>

            <div class="modal-body">
                <form role="form" method="post" action="/file/rename">
                    <input readonly name="thisdir" type="hidden"
                           class="form-control" id="dir">
                    <input readonly name="thisext" type="hidden"
                           class="form-control" id="ext">
                    <input readonly name="oldname" type="hidden"
                           class="form-control" id="oldname">
                    <input readonly name="thisid" type="hidden"
                           class="form-control" id="thisid">

                    <div class="input-group">
                        <label for="newname" class="sr-only">
                            重命名 </label>
                        <input name="newname" type="text"
                               class="form-control" id="newname">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">重命名</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    setupMove(
        true,
        "请至少选择一个文件",
            {{$parentid}},
        "cf1c355d8e28c8ebeabf6b5dab20ea07",
        18686983320);
</script>
<!--移动或复制文件模态框-->
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

                    <li><a href='#' data-dest='0' class='movelink' draggable='false'><i
                                    class='fa fa-folder-o'></i>根目录</a>
                        <?php
                        getChild($folderTree);
                        function getChild($next)
                        {
                            echo "<ul>";
                            foreach ($next as $value) {
                                echo "<li><a href='#' data-dest='$value->id' class='movelink' draggable='false'><i
                                            class='fa fa-folder-o'></i>$value->name</a>";
                                if ($value->next) {
                                    getChild($value->next);
                                }
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                        ?>

                    </li>
                </ul>
                <form id="moveform">
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    setupDelete(
        "你将永久删除这个项目",
        "你将永久删除这些文件",
        true,
            {{$parentid}},
        "cf1c355d8e28c8ebeabf6b5dab20ea07",
        18686983320,
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


<script type="text/javascript">
    var script_url = "http:\/\/www.p2.com\/";
    var baselink = "download/";
</script>


<!--视频图片播放模态框-->
<div class="modal fade zoomview" id="zoomview" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <div class="modal-title">
                    <div class="input-group">
                            <span class="input-group-btn">
                                <a class="vfmlink btn btn-primary" href="#">
                                    <i class="fa fa-download fa-lg"></i>
                                </a>
                            </span>
                        <input type="text" class="thumbtitle form-control" value="" onclick="this.select()" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="vfm-zoom"></div>
                <!--
                 <div style="position:absolute; right:10px; bottom:10px;">Custom Watermark</div>
                -->
            </div>
        </div>
    </div>
</div>

<link href="/assets/js/videojs/video-js.min.css" rel="stylesheet">
<script src="/assets/js/videojs/video.min.js"></script>

<!--加载视频-->
<script type="text/javascript">
    function loadVid(thislink, thislinkencoded, thisname, thisID, ext) {
        if (ext == 'ogv') {
            ext = 'ogg';
        }
        var vidlink = thislink;
        var playerhtml = '<video id="my-video" class="video-js vjs-16-9" >' + '<source src="' + vidlink + '" type="video/' + ext + '">';
        $(".vfm-zoom").html(playerhtml);
        videojs('#my-video', {
            "controls": true,
            "autoplay": true,
            "preload": "auto"
        }, function () {
            $('#zoomview').on('hidden.bs.modal', function (e) {
                if ($("#my-video").length) {
                    videojs('#my-video').dispose();
                }
            });
        });
        $("#zoomview .thumbtitle").val(thisname);
        $("#zoomview").data('id', thisID);
        $("#zoomview").modal();
        $(".vfmlink").attr("href", baselink + thislinkencoded);
    }
</script>

<!--加载图片-->

<script type="text/javascript">
    function loadImg(thislink, thislinkencoded, thisname, thisID) {
        console.log(thislink);
        $('.vfm-zoom').html('<i class="fa fa-refresh fa-spin"></i><img class="preimg" src="' + thislink + '">');
        $("#zoomview").data('id', thisID);
        $("#zoomview .thumbtitle").val(thisname);
        var firstImg = $('.preimg');
        firstImg.css('display', 'none');
        $("#zoomview").modal();

        firstImg.one('load', function () {
            $(".vfm-zoom .fa-refresh").fadeOut();
            $(this).fadeIn();
            checkNextPrev(thisID);
            $(".vfmlink").attr("href", baselink + thislinkencoded);
        }).each(function () {
            if (this.complete) {
                $(this).load();
            }
        });
    }
</script>

</body>
</html>