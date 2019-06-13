<!DOCTYPE HTML>
<head>
    <title>sky drive好友</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">

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
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#collapse-vfm-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:;" draggable="false">sky drive</a>
        </div>
        <div class="collapse navbar-collapse" id="collapse-vfm-menu">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="edituser" href="#" data-toggle="modal" data-target="#userpanel" draggable="false">
                        <span class="hidden-sm">
                            <strong>{{$user->username}}</strong>
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


<div class="container">

    <div class="row">

        <div id="error" style="display: none">
            <div class="alert-wrap ">
                <div class="response yep alert" role="alert">
                    <span id="tiperrortext"><i class="fa fa-check-circle"></i>  </span>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="panel panel-default row">
                <p class="friendlist">好友列表</p>
                <ul class="list-group friend_list">
                    <li class="list-group-item"><span friend-id="0000" class="friend">系统通知 <span
                                    class="fa fa fa-circle system-notice"></span></span></li>
                    @foreach($friends as $friend)
                        <li class="list-group-item"><span title="{{$friend->phone}}" friend-id="{{$friend->id}}"
                                                          class="friend">{{$friend->username}}<!--<span class="fa fa-circle offline"></span>--></span><a
                                    href="/friend/del/{{$friend->id}}" class="fa fa-trash-o del"></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default" style="height: 600px">
                <div class="text-center topname">系统通知</div>
                <div class="panel-body row pre-scrollable" style="max-height: 570px;">
                    <ul class="content-reply-box mg10">

                    </ul>

                    <div class="col-sm-12 sendmessage">
                        <form class="form-inline">
                            <button type="button" id="btnshare" class="btn btn-default col-xs-2 text-center" disabled>
                                分享文件
                            </button>
                            <div class="form-group col-sm-8">
                                <input type="text" class="form-control" style="width: 100%" id="message"
                                       placeholder="请输入需要发送的消息" autocomplete="off" disabled>
                            </div>
                            <button type="button" id="send" to-id="0000" class="btn btn-default col-xs-2" disabled>发送
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default row">
                <p class="text-center addfriend">添加好友</p>
                <form id="searchform">
                    <div class="form-group">
                        <input type="text" class="form-control" id="condition" placeholder="请输入用户名或手机"
                               autocomplete="off">
                    </div>
                    <button type="button" id="find" class="btn btn-default col-xs-12">搜索</button>
                </form>
                <div id="findlist">
                    <ul class="list-group">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <span class="pull-left">
            <a href="javascript:;">
            华东交通大学理工学院 rg2016-4</a>
            &copy; 2019
        </span>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>

<div class="modal fade" id="selectFile" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-list"></i>
                    选择需要发送的文件 </h4>
            </div>
            <div class="modal-body row">
                <!--<ol>
                    <li>
                        <a href="">
                            <i class="fa fa-folder-open"></i>根目录</a>
                    </li>
                </ol>-->
                <ul style="margin-left: 50px">

                </ul>
            </div>
            <div class="modal-footer">
                <button data-bb-handler="cancel" type="button" class="btn btn-default" onclick="$('#selectFile').modal('hide');">Cancel</button>
                <button data-bb-handler="confirm" type="button" class="btn btn-primary ok">OK</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function () {

        $('.close').click(function () {
            $('#error').hide();
        });

        //把系统消息刷入聊天窗口
        $(".content-reply-box").html(window.localStorage.getItem("0000"));

        //查询添加好友
        $("#find").click(function () {
            $("#findlist ul li").remove();
            var condition = $("#condition").val().trim();
            if (condition == "")
                return;
            $.post("/user/query", {condition: condition}, function (response) {
                var html = "";
                for (var i = 0; i < response.length; ++i) {

                    html += '<li class="list-group-item">';
                    html += '<span title="' + response[i].phone + '">' + response[i].username + '</span>';
                    html += '<a class="fa fa-plus addbtn" to-id="' + response[i].id + '">添加</a></li>';
                }
                $("#findlist ul").append(html);
            }, "json");
        });


        var serverUrl, socket;
        serverUrl = 'ws://127.0.0.1:8000/demo?id={{$user->id}}';
        if (window.MozWebSocket) {
            socket = new MozWebSocket(serverUrl);
        } else if (window.WebSocket) {
            socket = new WebSocket(serverUrl);
        }
        //socket.binaryType = 'blob';
        socket.onopen = function (msg) {
            $('.system-notice').css("color", "green");
        };
        //socket回调接收到消息
        socket.onmessage = function (msg) {
            //console.log(msg.data);
            var message = JSON.parse(msg.data);



            //console.log(message);

            var html = '<li class="odd">';
            html += '<a class="user" href="#"><img class="img-responsive avatar_" src="/assets/images/avatar.png" alt=""><span class="user-name">' + message.username + '</span></a>';
            html += '<div class="reply-content-box">';
            html += '<span class="reply-time">' + message.date + '</span>';
            html += '<div class="reply-content pr">';
            html += '<span class="arrow">&nbsp;</span>';
            //普通文本消息
            if (message.type == "text") {
                html += message.content;
                html += '</div></div></li>';
                var hostroy = window.localStorage.getItem(message.fromid);
                if (hostroy == null)
                    hostroy = "";
                window.localStorage.setItem(message.fromid, hostroy + html);
                if ($("#send").attr("to-id") == message.fromid)
                    $(".content-reply-box").append(html);
            }
            //接收到申请加好友信息
            else if (message.type == "apply") {
                html += '<span style="color: blue;">'
                    + message.content + '</span>请求添加你为好友？' +
                    '<a friend-id='+message.fromid+'  friend-name="'+message.content+
                    '"  style="color: blue" class="apply_friend" href="/friend/apply?userid=' +
                    message.fromid + '&friendid=' +
                    message.toid + '">同意</a>';
                html += '</div></div></li>';
                var hostroy = window.localStorage.getItem("0000");
                if (hostroy == null)
                    hostroy = "";
                window.localStorage.setItem("0000", hostroy + html);
                if ($("#send").attr("to-id") == "0000")
                    $(".content-reply-box").append(html);
            }else if(message.type=="file"){//接受到好友发送的文件消息
                html+='收到文件消息：<span class="fa fa-file-o"></span>';
                html += message.content.filename;
                html+='<a class="save" style="color: blue;margin-left: 20px;" href="/file/save/'+message.content.id+'">保存到我的云盘</a> ';
                html += '</div></div></li>';
                var hostroy = window.localStorage.getItem(message.fromid);
                if (hostroy == null)
                    hostroy = "";
                window.localStorage.setItem(message.fromid, hostroy + html);
                if ($("#send").attr("to-id") == message.fromid)
                    $(".content-reply-box").append(html);

            }else if(message.type=="agree"){ //接收好友同意加为好友
                html += '<span style="color: blue;">'
                    + message.content + '</span>同意了你申请加好友';
                html += '</div></div></li>';
                var hostroy = window.localStorage.getItem("0000");
                if (hostroy == null)
                    hostroy = "";
                window.localStorage.setItem("0000", hostroy + html);
                if ($("#send").attr("to-id") == "0000")
                    $(".content-reply-box").append(html);

                var html= '<li class="list-group-item"><span friend-id="'+message.fromid+'" class="friend">'+message.content+'</span><a href="/friend/del/'+message.fromid+'" class="fa fa-trash-o del"></a></li>'
                $(".friend_list").append( html );


            }

        };
        //与服务器失去连接
        socket.onclose = function (msg) {
            $('.system-notice').css("color", "gray");
        };

        //回车键触发发送消息
        $("#message").keypress(function (event) {
            if (event.keyCode == 13) {
                $('#send').click();
                return false;
            }
        });

        //发送文本消息
        $('#send').click(function () {
            var content = $("#message").val();
            if (content == "")
                return;
            var message = new Object();
            message.type = "text";
            message.fromid = "{{$user->id}}";
            message.username = "{{$user->username}}";
            message.toid = this.getAttribute("to-id");
            message.content = content;
            socket.send(JSON.stringify(message));


            var html = '<li class="even">';
            html += '<a class="user" href="#"><img class="img-responsive avatar_" src="/assets/images/avatar.png" alt=""><span class="user-name">{{$user->username}}</span></a>';
            html += '<div class="reply-content-box">';
            html += '<span class="reply-time">' + new Date().Format("yyyy-MM-dd HH:mm:ss") + '</span>';
            html += '<div class="reply-content pr">';
            html += '<span class="arrow">&nbsp;</span>' + content;
            html += '</div></div></li>';
            $(".content-reply-box").append(html);

            /*将数据存入缓存中*/
            window.localStorage.setItem(this.getAttribute("to-id"), $(".content-reply-box").html());

            $("#message").val("");
        });

        //点击好友列表切换好友
        $(document).on("click", ".friend", function () {
            /*将缓存中的数据取出*/
            $(".content-reply-box").html(window.localStorage.getItem(this.getAttribute("friend-id")));

            $(".topname").text(this.innerText);
            $("#send").attr("to-id", this.getAttribute("friend-id"));

            if (this.getAttribute("friend-id") == "0000") {
                $("#message").attr("disabled", true);
                $("#send").attr("disabled", true);
                $("#btnshare").attr("disabled", true);
            } else {
                $("#message").attr("disabled", false);
                $("#send").attr("disabled", false);
                $("#btnshare").attr("disabled", false);
            }
        });

        //发送请求添加好友请求
        $(document).on("click", ".addbtn", function () {
            var message = new Object();
            message.type = "apply";
            message.username = "系统通知";
            message.fromid = "{{$user->id}}";
            message.toid = this.getAttribute("to-id");
            message.content = "{{$user->username}}";
            socket.send(JSON.stringify(message));
            $('#tiperrortext').text("已发送请添加好友");
            $('#error').show();

        });
        //点击分享文件按钮
        $("#btnshare").click(function () {
            getfilelist("/file/list/0")
        });
        //获取文件列表
        function getfilelist(url) {
            select_file_id="";
            $.post(url,function (response) {
                var html="";
                var dirs=response.dirs;
                for(var i=0;i<dirs.length;++i){
                    html+='<li><a href="/file/list/'+dirs[i].id+'" class="col-xs-10 folder"><i class="fa fa-folder-open"></i>'+dirs[i].name+'</a></li>';
                }
                var files=response.files;
                for(var i=0;i<files.length;++i){
                    html+='<li><a href="'+files[i].id+'" class="col-xs-10 file"><i class="fa fa-file-o"></i>'+files[i].name+'</a></li>';
                }

                $("#selectFile ul li").remove();
                $("#selectFile ul").append(html);
                $("#selectFile").modal("show");
            },'json');
        }
        //点击文件夹进入下一级
        $(document).on("click",".folder",function () {
            var url=this.getAttribute("href");
            getfilelist(url);
            return false;
        });

        //存储点击文件的id的全局变量
        var select_file_id="";
        var select_file_name="";
        //点击文件存储选择的id到全局变量
        $(document).on("click",".file",function () {
            select_file_id=this.getAttribute("href");
            select_file_name=this.innerText;
            return false;
        });
        //选择好文件后点击ok按钮，发送文件消息
        $(".ok").click(function () {

            var message = new Object();
            message.type = "file";
            message.fromid = "{{$user->id}}";
            message.username = "{{$user->username}}";
            message.toid = $("#send").attr("to-id");
            message.content = {id:select_file_id,filename:select_file_name};
            socket.send(JSON.stringify(message));

            var html = '<li class="even">';
            html += '<a class="user" href="#"><img class="img-responsive avatar_" src="/assets/images/avatar.png" alt=""><span class="user-name">{{$user->username}}</span></a>';
            html += '<div class="reply-content-box">';
            html += '<span class="reply-time">' + new Date().Format("yyyy-MM-dd HH:mm:ss") + '</span>';
            html += '<div class="reply-content pr">';
            html += '<span class="arrow">&nbsp;</span>发送文件：<span class="fa fa-file-o"></span> ' + select_file_name;
            html += '</div></div></li>';
            $(".content-reply-box").append(html);
            $("#selectFile").modal("hide");
            window.localStorage.setItem($("#send").attr("to-id"), $(".content-reply-box").html());

        });
        //点击同意添加好友
        $(document).on("click", ".apply_friend", function () {
            //console.log(this.getAttribute("href"));
            this.innerText="已同意";
            window.localStorage.setItem("0000", $(".content-reply-box").html());

            var _this=this;
            $.get(this.getAttribute("href"), {}, function (response) {
                //code msg  0已经是好友  1成功  2内部错误
                $('#tiperrortext').text(response.msg);
                $('#error').show();
                if(response.code==1){
                    var html= '<li class="list-group-item"><span friend-id="'+_this.getAttribute("friend-id")+'" class="friend">'+_this.getAttribute("friend-name")+'</span><a href="/friend/del/'+_this.getAttribute("friend-id")+'" class="fa fa-trash-o del"></a></li>'
                    $(".friend_list").append( html );

                    var message = new Object();
                    message.type = "agree";
                    message.username = "系统通知";
                    message.fromid = "{{$user->id}}";
                    message.toid = _this.getAttribute("friend-id");
                    message.content = "{{$user->username}}";
                    socket.send(JSON.stringify(message));
                    //console.log("点击同意");

                }
            }, 'json');
            return false;
        });
        //点击保存到自己的网盘
        $(document).on("click", ".save", function () {
            //console.log(this.getAttribute("href"));
            $.get(this.getAttribute("href"), {}, function (response) {
                $('#tiperrortext').text(response.msg);
                $('#error').show();
            }, 'json');
            return false;
        });
        //时间格式化
        Date.prototype.Format = function (fmt) { //author: meizz
            var o = {
                "M+": this.getMonth() + 1, //月份
                "d+": this.getDate(), //日
                "H+": this.getHours(), //小时
                "m+": this.getMinutes(), //分
                "s+": this.getSeconds(), //秒
                "q+": Math.floor((this.getMonth() + 3) / 3), //季度
                "S": this.getMilliseconds() //毫秒
            };
            if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
            for (var k in o)
                if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            return fmt;
        }
    });
</script>
</body>
</html>
