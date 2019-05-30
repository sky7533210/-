<!DOCTYPE HTML>
<html>
<head>
    <title>sky云盘找回密码</title>
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
            <a class="navbar-brand" href="javascript:;">乌云极简云盘</a>
        </div>
    </div>
</nav>


<header class="vfm-header">
    <div class="container">
        <div class="head-banner text-center">
            <a href="http://www.p2.com/">
                <img alt="乌云极简云盘" src="/assets/images/logo.png">
            </a>
        </div>
    </div> <!-- .container -->
</header>
<div class="container">
    <div class="main-content">
        <section class="vfmblock">
            <div class="login">
                <form>
                    <div class="sendresponse"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-unlock-alt"></i> 重设密码
                        </div>
                        <div class="panel-body">
                            <label class="sr-only">手机</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                                    <input id="phone" type="email"
                                           placeholder="手机"
                                           class="form-control" value="">
                                </div>
                            </div>

                            <label class="sr-only">新密码</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input id="password" type="password"
                                           placeholder="请输入新密码"
                                           class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group captcha-group">
                                <div class="input-group">
                                    <input class="form-control input" id="smscode" type="text"
                                           placeholder="请输入短信验证码"/>
                                    <span class="input-group-btn">
            <button class="btn btn-default btn" type="button" id="btngetsmscode">
                获取验证码
            </button>
        </span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-block btn-primary" id="submit">
                                <i class="fa fa-arrow-circle-right"></i>提交
                            </button>
                        </div>
                        <div class="panel-footer">
                            输入您的手机号，发送短信验证码,输入验证码提交
                        </div>
                        <div class="mailpreload">
                            <div class="cta">
                                <i class="fa fa-refresh fa-spin"></i>
                            </div>
                        </div>
                    </div>
                </form>
                <a href="/login">
                    <i class="fa fa-sign-in"></i> 登陆 </a>
            </div> <!-- .login -->
        </section>
    </div> <!-- .main-content -->
</div> <!-- .container -->
<footer class="footer">
    <div class="container">
        <span class="pull-left">乌云网&copy; 2019</span>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/sendSms.js"></script>

<script type="text/javascript">
    $(function () {
        /*发送短信验证码*/
        $("#btngetsmscode").click(function () {
            var phone=$("#phone").val();
            sendsms(phone,"psw",function (response) {
                var data = eval("("+response+")");
                alert(data.msg);
            })
        });

        /*提交修改*/
        $("#submit").click(function () {
            var phone= $("#phone").val().trim();
            var password=$("#password").val().trim();
            var smscode=$("#smscode").val().trim();
            $.ajax({
                url: '/updatepsw',
                type: 'post',
                data: {
                    phone:phone,
                    password:password,
                    smscode:smscode
                },
                dataType:"json",
                success: function (response) {
                    var data =eval("("+response+")");
                    alert(data.msg);
                }
            });
        });
    });
</script>

</body>
</html>