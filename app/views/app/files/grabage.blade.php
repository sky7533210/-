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
                    <a href="#" draggable="false">
                        <span class="hidden-sm">
                            <strong>我的分享</strong>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#" draggable="false">
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
        <p>已删除文件/p>
        <section class="tableblock">
            <table class="table" width="100%" id="">
                <thead>
                <tr class="rowa two">
                    <td class="mini">
                        文件名
                    </td>
                    <td class="mini">
                        大小
                    </td>
                    <td class="mini">
                        创建时间
                    </td>
                    <td class="mini">
                        删除时间
                    </td>
                    <td class="mini">
                        操作
                    </td>
                </tr>
                </thead>
                <tbody>

                @foreach($shares as $share)
                    <tr class="rowa">
                        <td class="name">
                            {{ $share->name }}
                        </td>
                        <td class="mini">
                            @if($share->size < 1024)
                                {{$share->size}}B
                            @elseif($share->size < 1024 * 1024)
                                {{round(($share->size / 1024), 2)}}KB
                            @else
                                {{round(($share->size / 1024 / 1024), 2)}}MB
                            @endif
                        </td>
                        <td class="mini">
                            {{ $share->endTime }}
                        </td>
                        <td class="mini">
                            {{ $share->key }}
                        </td>
                        <td class="mini">
                            {{ $share->url}}
                        </td>
                        <td class="mini">
                            删除
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
</body>
</html>