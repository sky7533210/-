<!DOCTYPE HTML>
<html>
<head>
    <title>Sky drive</title>

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
            <a class="navbar-brand" href="javascript:;">sky drive</a>
        </div>
    </div>
</nav>

<header class="vfm-header">
    <div class="container">
        <div class="head-banner text-center">
            <a href="javascript:;">
                <img alt="sky drive" src="/assets/images/logo.png">
            </a>
        </div>
    </div> <!-- .container -->
</header>
<div class="container">

   <div id="error" style="display: none">
        <div class="alert-wrap ">
            <div class="response yep alert" role="alert">
                <span id="tiperrortext"><i class="fa fa-check-circle"></i> 密码输入错误</span>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="row" id="dwnldpwd">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                {{$sharename}} 分享的文件
                <form>
                    <div class="form-group">
                        <label for="dwnldpwd">密码</label>
                        <input type="password" id="pwd" class="form-control" placeholder="密码" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block" id="submit">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
            </div>
        </div>


    </div> <!-- .main-content -->
</div> <!-- .container -->
<footer class="footer">
    <div class="container">
        <span class="pull-left"><a href="javascript:;" target="_blank">sky云网 </a>© 2019</span>
    </div>
</footer>
<script src="/assets/js/jquery-1.12.4.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('#submit').click(function () {
            var pwd= $('#pwd').val();
            $.ajax({
                url:'/share/checkpass/{{$keyw1}}'
                ,type:'POST'
                ,dataType:'json'
                ,data:{
                    pwd:pwd
                }
                ,success:function (response) {
                    console.log(response);
                    var data=eval('('+response+')');
                    if(data.code){
                        location.href='/share/{{$keyw1}}';
                    }else{
                        $('#error').show();
                    }
                }
            });
        });
    });
</script>
</body>
</html>