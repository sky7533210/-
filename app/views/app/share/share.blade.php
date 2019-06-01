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
            <a class="navbar-brand" href="javascript:;">sky云盘</a>
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
    <div id="error">
    </div>
    <div class="main-content">

        {{$username}} 分享的文件
        <!--下载文件列表-->
        <div class="intero">
            <ul class="multilink">
                @foreach($files as $file)
                    <li>
                        <a class="btn btn-primary"
                           href="/share/download/{{base64_encode($file->id)}}?keyw={{$keyw}}">
                            <span class="pull-left small">
                                <i class="fa {{key_exists($file->type,$fa)? $fa[$file->type]:'fa-file-o'}} fa-2x"></i> {{$file->name}}
                            </span>
                            <span class="pull-right small">
                                 @if($file->size < 1024)
                                    {{$file->size}}B
                                @elseif($file->size < 1024 * 1024)
                                    {{round(($file->size / 1024), 2)}}KB
                                @else
                                    {{round(($file->size / 1024 / 1024), 2)}}MB
                                @endif
                                <i class="fa fa-download fa-2x"></i>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
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
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>