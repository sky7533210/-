<!DOCTYPE HTML>
<head>
    <title>Sky云盘管理员登录</title>
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
    <link href="/assets/css/bootstrapValidator.min.css" rel="stylesheet">

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

    <div class="main-content">
        <section class="vfmblock">
            <div class="login">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id="form">
                            <div id="login_bar" class="form-group">
                                <div class="form-group">
                                    <label class="sr-only" for="user_name">
                                        账号 </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile-phone fa-fw"></i></span>
                                        <input type="text" value="" id="userid" name="userid" class="form-control"
                                               placeholder="请输入管理员账号" />
                                    </div>
                                </div>
                                <div class="form-group pwd">
                                    <label class="sr-only" for="user_pass">
                                        密码 </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                        <input type="password" id="password" name="password" autocomplete="off" class="form-control"
                                               placeholder="请输入管理员密码"/>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="button" id="btnlogin"/>
                                <i class="fa fa-sign-in"></i>登陆</button>
                            </div>
                        </form>
                    </div>
                </div>
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

<script src="/assets/js/bootstrapValidator.min.js"></script>

<script type="text/javascript">
    $(function () {

        $('.close').click(function () {
            $('#error').hide();
        });

        $('#form').bootstrapValidator({
            message: 'This value is not valid',
            live: 'disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                userid: {
                    validators: {
                        notEmpty: {
                            message: '账号不能为空'
                        },
                        regexp: {//正则验证
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: '所输入的字符不符要求'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '密码不能为空'
                        },
                        regexp: {//正则验证
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: '所输入的字符不符合要求'
                        }
                    }
                }
            }
        });

        $("#btnlogin").click(function () {//非submit按钮点击后进行验证，如果是submit则无需此句直接验证
            $("#form").bootstrapValidator('validate');//提交验证
            if ($("#form").data('bootstrapValidator').isValid()) {//获取验证结果，如果成功，执行下面代码
                $.ajax({
                    url: '/admin/login',
                    type: 'post',
                    data: $("#form").serializeArray(),
                    dataType:"json",
                    success: function (response) {
                        var data =eval("("+response+")");
                        if(data.success==0){
                            $('#tiperrortext').text(data.msg);
                            $('#error').show();
                        }else{
                            window.location.href="/admin/home";
                        }
                    }
                });
            }
        });
    });
</script>
</body>
</html>