<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>找回密码</title>

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
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <h1>用户登录</h1>
            <hr>
            <a href="/login" class="btn btn-primary">登录</a>
            <form id="loginbypass">
                <div class="form-group">
                    <label>手机</label>
                    <input type="text" name="phone" id="phone" placeholder="手机号" autocomplete="on" class="form-control">
                </div>

                <div id="sms" class="form-group" style="display: none">
                    <label>短信验证码</label>
                    <input type="text" name="smscode" id="smscode" placeholder="短信验证码" autocomplete="off" class="form-control">
                    <a id="btngetsmscode" class="btn btn-primary">发送验证码</a>
                </div>

                <div class="form-group">
                    <input type="button" id="btnlogin" value="登录" class="btn btn-block btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/sendSms.js"></script>
<script>
    (function () {
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
                    var data = eval("("+response+")");
                    console.log(data);
                    if(data.success==0){
                        alert(data.msg);
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