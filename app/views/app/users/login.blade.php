<!DOCTYPE HTML>
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
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:;">Sky云盘</a>
        </div>
    </div>
</nav>

<!--logo-->
<header class="vfm-header">
    <div class="container">
        <div class="head-banner text-center">
            <a href="javascript:;">
                <img alt="极简云盘" src="/assets/images/logo.png">
            </a>
        </div>
    </div>
</header>


<div class="container">
    <div class="main-content">

        <div  id="error" style="display: none;">
            <div class="alert-wrap ">
                <div class="response yep alert" role="alert">
                    <span id="tiperrortext"><i class="fa fa-check-circle"></i> 数字.txt </span>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>

        <section class="vfmblock">
            <div class="login">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <a id="btnloginswitch" class="btn btn-primary">短信快捷登录</a>
                            </div>
                            <div id="login_bar" class="form-group">
                                <div class="form-group">
                                    <label class="sr-only" for="user_name">
                                        手机 </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile-phone fa-fw"></i></span>
                                        <input type="text" name="phone" value="" id="phone" class="form-control"
                                               placeholder="手机" />
                                    </div>
                                </div>
                                <div class="form-group pwd">
                                    <label class="sr-only" for="user_pass">
                                        密码 </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                        <input type="password" name="password" id="password" autocomplete="off" class="form-control"
                                               placeholder="密码"/>
                                    </div>
                                </div>

                                <div class="form-group captcha-group pwd">
                                    <div class="input-group">
                                        <span class="input-group-addon captchadd">
                                            <img src="/captcha" name="captcha" id="captcha">
                                        </span>

                                        <input class="form-control input" id="authcode" type="text" name="authcode"
                                               placeholder="验证码"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn" type="button" id="capreload">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group" id="sms" style="display: none">
                                    <div class="input-group">
                                        <input class="form-control input" id="smscode" type="text" name="smscode"
                                               placeholder="请输入短信验证码"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn" type="button" id="btngetsmscode">
                                                获取验证码
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block" type="button" id="btnlogin"/>
                                <i class="fa fa-sign-in"></i>登陆</button>
                            </div>
                        </form>
                        <p><a href="/findpsw">忘记密码？</a></p>
                    </div>
                </div>
                <p>
                    <a class="btn btn-default btn-block" href="/register">
                        <i class="fa fa-user-plus"></i> 注册 </a>
                </p>
            </div>
        </section>
    </div> <!-- .main-content -->
</div> <!-- .container -->
<footer class="footer">
    <div class="container">
        <span class="pull-left">
            SKY云网&copy; 2019
        </span>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/sendSms.js"></script>

<script type="text/javascript">
    $(function () {

        $('.close').click(function () {
            $('#error').hide();
        });

        $('#capreload').click(function(){
            $('#captcha').attr('src', '/captcha?'+Math.random());
            $('#authcode').val('');
        });


        var i=0;
        $("#btnloginswitch").click(function () {
            if(i%2==0){
                $("#btnloginswitch").text("手机密码登录");
                $(".pwd").hide();
                $("#sms").show();
            }else{
                $("#btnloginswitch").text("短信快捷登录");
                $(".pwd").show();
                $("#sms").hide();
            }
            i++;
        });

        $("#btngetsmscode").click(function () {
            var phone=$("#phone").val();
            sendsms(phone,"login",function (response) {
                var data = eval("("+response+")");
                alert(data.msg);
            })
        });

        $("#btnlogin").click(function () {
            var data;
            var phone=$("#phone").val();
            if(i%2==1){
                var smscode=$("#smscode").val();
                data= {
                    'phone': phone
                    ,'smscode':smscode
                    , 'method': 'sms'
                }
            }else{
                var password=$("#password").val();
                var authcode=$("#authcode").val();
                data={
                    'phone':phone
                    ,'password':password
                    ,'authcode':authcode
                    ,'method':'pwd'
                }
            }
            $.ajax({
                url: '/login',
                type: 'post',
                data: data,
                dataType:"json",
                success: function (response) {
                    var data =eval("("+response+")");
                    if(data.success==0){
                        $('#tiperrortext').text(data.msg);
                        $('#error').show();
                        $('#captcha').attr('src', '/captcha?'+Math.random());
                        $('#authcode').val('');
                    }else{
                        window.location.href="/home";
                    }
                }
            });
        });
    });
</script>
</body>
</html>