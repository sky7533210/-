<!DOCTYPE HTML>
<html>
<head>
    <title>管理 | Sky云盘</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/admin.min.css">
    <link rel="stylesheet" href="/assets/css/admin-skins.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <script src="/assets/js/jquery-1.12.4.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.min.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="/assets/js/jquery-1.12.4.min.js"></script>

    <link rel="stylesheet" href="/assets/css/vfm-style.css">
    <link rel="stylesheet" href="/assets/skins/vfm-2016.css">

</head>
<body class="skin-blue fixed sidebar-mini admin-body" data-target="#scrollspy" data-spy="scroll">
<div class="anchor" id="view-preferences"></div>
<div class="wrapper">
    <header class="main-header">
        <a href="./" class="logo">
            sky云盘 </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://www.p2.com/">
                            <i class="fa fa-home fa-fw"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/logout" title="登出">
                            <i class="fa fa-sign-out fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 704px;">
            <section class="sidebar" id="scrollspy" style="height: 704px; overflow: hidden; width: auto;">
                <ul class="sidebar-menu nav">
                    <li class="header text-uppercase">管理</li>

                    <li class="treeview active">
                        <a href="#view-preferences">
                            <i class="fa fa-dashboard fa-fw"></i>
                            <span>基本设置</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class=""><a href="#view-general">
                                    <i class="fa fa-cogs fa-fw"></i>
                                    <span>概览</span></a>
                            </li>
                            <li><a href="#view-lists"><i class="fa fa-list-alt fa-fw"></i>
                                    <span>列表</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="?users=go">
                            <i class="fa fa-users fa-fw"></i> <span>用户</span></a></li>
                    <li><a href="?languagemanager=go">
                            <i class="fa fa-language fa-fw"></i> <span>多语言</span></a></li>
                </ul>
            </section>
            <div class="slimScrollBar"
                 style="background: rgba(0, 0, 0, 0.2); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 704px;"></div>
            <div class="slimScrollRail"
                 style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <div class="content-header">
            <h3><i class="fa fa-tachometer"></i>
                基本信息 </h3>
        </div>
        <div class="content">
            <!--内容-->
            <p>所有文件</p>
            <section class="tableblock">
                <table class="table" width="100%" id="">
                    <thead>
                    <tr class="rowa two">
                        <td class="mini">MD5值</td>
                        <td class="mini">
                            类型
                        </td>
                        <td class="mini">
                            大小
                        </td>
                        <td class="mini">
                            创建时间
                        </td>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($files as $file)
                        <tr class="rowa">
                            <td class="name">
                                  {{ $file->md5 }}
                            </td>
                            <td class="mini">
                                {{ $file->type }}
                            </td>
                            <td class="mini">
                                @if($file->size < 1024)
                                    {{$file->size}}B
                                @elseif($file->size < 1024 * 1024)
                                    {{round(($file->size / 1024), 2)}}KB
                                @else
                                    {{round(($file->size / 1024 / 1024), 2)}}MB
                                @endif
                            </td>
                            <td class="mini">
                                {{ $file->createTime }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </section>


            <p>所有用户</p>
            <section class="tableblock">
                <table class="table" width="100%" id="">
                    <thead>
                    <tr class="rowa two">
                        <td class="mini">ID</td>
                        <td class="mini">
                            手机
                        </td>
                        <td class="mini">
                            用户名
                        </td>
                        <td class="mini">
                            Email
                        </td>
                        <td class="mini">
                            创建时间
                        </td>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($users as $user)
                        <tr class="rowa">
                            <td class="name">
                                {{ $user->id }}
                            </td>
                            <td class="mini">
                                {{ $user->phone }}
                            </td>
                            <td class="mini">
                                {{ $user->username }}
                            </td>
                            <td class="mini">
                                {{ $user->email }}
                            </td>
                            <td class="mini">
                                {{ $file->createTime }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </section>

        </div>
        <br>
        <br>
        <br>
    </div> <!-- content-wrapper -->

    <footer class="main-footer">
        <a href="javascript:;"><strong>sky云盘</strong></a> © 2019
    </footer>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

</div>
</body>
</html>