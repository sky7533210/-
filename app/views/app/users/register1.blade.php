<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sky云盘登录</title>
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
            <a class="navbar-brand" href="javascript:;">
                sky云盘 </a>
        </div>
    </div>
</nav>


<header class="vfm-header">
    <div class="container">
        <div class="head-banner text-center">
            <a href="javascript:;">
                <img alt="sky云盘" src="/assets/images/logo.png">
            </a>
        </div>
    </div> <!-- .container -->
</header>
<div class="container">
    <div class="main-content">
        <section class="vfmblock">
            <div class="login">
                <div id="regresponse"></div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user-plus"></i> 注册
                    </div>
                    <div class="panel-body">
                        <form>
                            <div id="login_bar" class="form-group">
                                <div class="form-group">
                                    <div class="has-feedback">
                                        <label for="phone">*手机 </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile-phone fa-fw"></i>
                                            </span>
                                            <input type="text" id="phone"
                                                   class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="has-feedback">
                                            <label for="username">*呢称 </label>
                                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user fa-fw"></i>
                                                    </span>
                                                <input type="text" name="username" value="" id="username"
                                                       class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="user_pass">*
                                            密码 </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                            <input type="password" name="password" id="password"
                                                   class="form-control" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_pass">*
                                            密码 (确认) </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                            <input type="password" name="repassword" id="repassword" id="user_pass_check"
                                                   class="form-control" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group captcha-group">
                                            <div class="input-group">
                                                <input class="form-control input" id="smscode" type="text" name="smscode"
                                                       placeholder="短信验证码"/>
                                                <span class="input-group-btn">
                                        <button class="btn btn-default btn" type="button" id="btnsendsms">
                                            获取验证码
                                        </button>
                                </span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-block " id="btnregister"/>
                                        <i class="fa fa-check"></i>
                                        注册                                </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="mailpreload">
                        <div class="cta">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
                <a href="/login"><i class="fa fa-sign-in"></i> 登陆</a>
            </div>
        </section>
    </div> <!-- .main-content -->
</div> <!-- .container -->
<footer class="footer">
    <div class="container">
        <span class="pull-left"><a href="javascript:;" target="_blank">
            乌云网 </a>
            &copy; 2019 </span>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/sendSms.js"></script>

<script type="text/javascript">
    $(function (){
        $("#btnsendsms").click(function () {
            var phone=$.trim( $("#phone").val());
            sendsms(phone,"reg",function (res) {
                var data = eval("("+res+")");
                alert(data.msg);
            })
        });

        $("#btnregister").click(function () {
            var phone= $("#phone").val().trim();
            var username=$("#username").val().trim();
            var password=$("#password").val().trim();
            var smscode=$("#smscode").val().trim();
            $.ajax({
                url: '/register',
                type: 'post',
                data: {
                    'phone':phone
                    ,'username':username
                    ,'password':password
                    ,'smscode':smscode
                },
                dataType:"json",
                success: function (response) {
                    var data = eval("("+response+")");
                    if(data.success==0){
                        alert(data.msg);
                    }else{
                        alert(data.msg);
                    }
                }
            });

        })
    });
</script>

</body>
</html>