<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title></title>

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
<!-- some contents  -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <h1>用户注册</h1>
            <hr>
            <a href="/login" class="btn btn-primary">去登录</a>
            <form>
                <div class="form-group">
                    <label>手机</label>
                    <input type="text" name="phone" id="phone" placeholder="手机号" autocomplete="on" class="form-control">
                </div>

                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" name="username" id="username" placeholder="用户名" autocomplete="off" class="form-control">
                </div>

                <div class="form-group">
                    <label>密码</label>
                    <input type="password" name="password" id="password" placeholder="密码" autocomplete="off" class="form-control">
                </div>

                <div class="form-group">
                    <label>确认密码</label>
                    <input type="password" name="repassword" id="repassword" placeholder="确认密码" autocomplete="off" class="form-control">
                </div>

                <div class="form-group">
                    <label>短信验证码</label>
                    <input type="text" name="smscode" id="smscode" placeholder="验证码" autocomplete="off" class="form-control">
                    <button id="btnsendsms" type="button" class="btn btn-primary">发送</button>
                </div>

                <div class="form-group">
                    <input type="button" id="btnregister" value="注册" class="btn btn-block btn-primary">
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