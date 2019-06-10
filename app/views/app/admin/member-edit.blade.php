<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/assets/css/font.css">
    <link rel="stylesheet" href="/assets/css/xadmin.css">
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/assets/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-body">
        <form class="layui-form">
            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span class="x-red">*</span>手机
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="phone" name="phone" required="" class="layui-input" value="{{$user->phone}}" lay-verify="phone">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>将会成为您唯一的登入手机号
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span class="x-red">*</span>昵称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="username" name="username" required=""
                            class="layui-input" value="{{$user->username}}">
                </div>
            </div>

          <div class="layui-form-item">
              <label class="layui-form-label">
                  <span class="x-red">*</span>邮箱
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="email" name="email" required="" value="{{$user->email}}" lay-verify="email"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  提交
              </button>
          </div>
      </form>
    </div>
    <script>
      layui.use(['form','layer'], function(){
          $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer;

        //自定义验证规则
        form.verify({
          phone: function(value){
              var pattern=/1[34578]\d{9}/;
            if(!pattern.test(value)){
              return '请输入正确的手机号';
            }
          }
        });

        //监听提交
        form.on('submit(add)', function(data){
         $.post("/admin/membereidt",data.field,function (response) {
             layer.alert(response.msg, {icon: 6},function () {
                 var index = parent.layer.getFrameIndex(window.name);
                 parent.layer.close(index);
             });
         },"json");
          return false;
        });
        
        
      });
  </script>
  </body>

</html>