<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>sky drive注册</title>
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
<div class="overdrag"></div>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:;">
                sky drive </a>
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
                <div id="regresponse"></div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user-plus"></i> 注册
                        <a href="/login" style="float: right"><i class="fa fa-sign-in"></i> 去登陆</a>
                    </div>
                    <div class="panel-body">
                        <form id="form">
                            <div id="login_bar" class="form-group">
                                <div class="form-group">
                                    <div class="has-feedback">
                                        <label for="phone">手机 </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile-phone fa-fw"></i>
                                            </span>
                                            <input type="text" id="phone" name="phone"
                                                   class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="has-feedback">
                                            <label for="username">呢称 </label>
                                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user fa-fw"></i>
                                                    </span>
                                                <input type="text" name="username" value="" id="username" autocomplete="off"
                                                       class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="user_pass">
                                            密码 </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                            <input type="password" name="password" id="password"
                                                   class="form-control" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_pass">
                                            密码 (确认) </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                            <input type="password" name="repassword" id="repassword"
                                                   id="user_pass_check"
                                                   class="form-control" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group captcha-group">
                                            <div class="input-group">
                                                <input class="form-control input" id="smscode" type="text"
                                                       name="smscode"
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
                            </div>
                        </form>
                    </div>
                    <div class="mailpreload">
                        <div class="cta">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> <!-- .main-content -->
</div> <!-- .container -->
<footer class="footer">
    <div class="container">
        <span class="pull-left"><a href="javascript:;">
            华东交通大学理工学院 rg2016-4</a>
            &copy; 2019 </span>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/sendSms.js"></script>
<script src="/assets/js/bootstrapValidator.min.js"></script>

<script type="text/javascript">
    $(function () {

        $('.close').click(function () {
            $('#error').hide();
        });

        $("#btnsendsms").click(function () {
            $('#form').data('bootstrapValidator',null);
            $('#form').bootstrapValidator({
                message: 'This value is not valid',
                live: 'disabled',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    phone: {
                        validators: {
                            notEmpty: {
                                message: '手机号不能为空'
                            },
                            regexp: {//正则验证
                                regexp: /^1[34578]\d{9}$/,
                                message: '请输入正确的手机号码'
                            }
                        }
                    }
                }
            });
            $("#form").bootstrapValidator('validate');//提交验证
            if (!($("#form").data('bootstrapValidator').isValid())) {//获取验证结果，如果成功，执行下面代码
                return;
            }
            var phone = $.trim($("#phone").val());
            sendsms(phone, "reg", function (res) {
                $('#tiperrortext').text(res.msg);
                $('#error').show();
            })
        });

        $("#btnregister").click(function () {

            $('#form').data('bootstrapValidator',null);
            $('#form').bootstrapValidator({
                message: 'This value is not valid',
                live: 'disabled',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    phone: {
                        validators: {
                            notEmpty: {
                                message: '手机号不能为空'
                            },
                            regexp: {//正则验证
                                regexp: /^1[34578]\d{9}$/,
                                message: '所输入真确的手机号码'
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: '昵称不能为空'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: '密码不能为空'
                            },
                            identical: {
                                field: 'repassword',
                                message: '与确认密码不同'
                            },
                            regexp: {//正则验证
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: '所输入的字符不符合要求'
                            }
                        }
                    },
                    repassword: {
                        validators: {
                            notEmpty: {
                                message: '密码不能为空'
                            },
                            identical: {
                                field: 'password',
                                message: '与密码不同'
                            },
                            regexp: {//正则验证
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: '所输入的字符不符合要求'
                            }
                        }
                    },
                    smscode: {
                        validators: {
                            notEmpty: {
                                message: '短信验证码不能为空'
                            },
                            regexp: {//正则验证
                                regexp: /^\d{6}$/,
                                message: '请输入6位数字'
                            }
                        }
                    }
                }
            });
            $("#form").bootstrapValidator('validate');//提交验证
            if (!($("#form").data('bootstrapValidator').isValid())) {//获取验证结果，如果成功，执行下面代码
                return;
            }

            var phone = $("#phone").val().trim();
            var username = $("#username").val().trim();
            var password = $("#password").val().trim();
            var smscode = $("#smscode").val().trim();
            $.ajax({
                url: '/register',
                type: 'post',
                data: {
                    'phone': phone
                    , 'username': username
                    , 'password': password
                    , 'smscode': smscode
                },
                dataType: "json",
                success: function (response) {
                    if (data.success == 0) {
                        $('#tiperrortext').text(response.msg);
                        $('#error').show();
                    } else {
                        $('#tiperrortext').text(response.msg);
                        $('#error').show();
                    }
                }
            });

        })
    });
</script>

</body>
</html>