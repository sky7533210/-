<?php

class UsersController extends Controller
{
    protected $access_control = true;//设置是否开启访问权限控制，如要开启必须设置

    protected $accessible_list = [
        'login', 'login_check', 'register', 'register_action', 'sendSmsCode', 'findPsw', 'updatePsw','mlogin_check'
    ];//设置允许未登录访问的操作（即控制器中的方法）

    protected $login_identifier = 'user';//设置session中的登录检测标识，根据编码设置

    protected $login_route = '/login';//设置未允许访问时跳转的登录页面，根据路由设置

    public function login()
    {
        if (session('user')) {
            return redirect('/home');
        }
        if (key_exists('url', $_GET))
            $url = $_GET['url'];
        else
            $url = '/home';
        return view('app/users/login', compact('url'));
    }

    public function findPsw()
    {
        return view('app/users/findPsw');
    }

    public function login_check()
    {
        //检验数据的有效性 //保证系统数据的安全健壮
        $phone = $_POST['phone'];
        $method = $_POST['method'];

        if ($method == 'pwd') {
            $password = md5($_POST['password']);
            $authcode = $_POST['authcode'];
            //用户名和密码不能为空
            if (empty($phone) || empty($password) || empty($authcode)) {
                echo json_encode("{success:0,msg:'用户名或密码或验证码为空'}");
                return;
            }
            if (!(new CaptchaService())->check($authcode)) {
                echo json_encode("{success:0,msg:'验证码填写错误'}");
                return;
            }
            $sql = 'select * from `user` where phone = "' . $phone . '" and password ="' . $password . '" and status="1"';
            $user = (new DB())->find($sql);
        } else if ($method == 'sms') {
            $smscode = $_POST['smscode'];
            $verifyInfo = session('verifyInfo');
            if ($verifyInfo && $verifyInfo['phone'] == $phone && $verifyInfo['smscode'] == $smscode && strtotime(date('y-m-d H:i:s')) - strtotime($verifyInfo['time']) < 300) {
                flash('verifyInfo');
                $sql = 'select * from `user` where phone = "' . $phone . '"';
                $user = (new DB())->find($sql);
            } else {
                echo json_encode("{success:0,msg:'短信验证码填写错误'}");
                return;
            }
        }
        if ($user) {
            session('user', $user);
            //setcookie('PHPSESSID', $_COOKIE['PHPSESSID'], time()+3600);
            echo json_encode("{success:1,msg:'登录成功'}");
            return;
        } else {
            echo json_encode("{success:0,msg:'手机号或密码错误'}");
            return;
        }
    }


    public function mlogin_check(){
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        //用户名和密码不能为空
        if (empty($phone) || empty($password)) {
            echo '{"success":0,"msg":"用户名或密码不能为空"}';
            return;
        }
        $password=md5($password);
        $sql = 'select * from `user` where phone = "' . $phone . '" and password ="' . $password . '" and status="1"';
        $user = (new DB())->find($sql);

        if ($user) {
            session('user', $user);
            echo '{"success":1,"msg":"登入成功"}';
            return;
        } else {
            echo '{"success":0,"msg":"用户名或密码错误"}';
            return;
        }
    }

    public function sendSmsCode()
    {
        $phone = $_POST['phone'];
        $what = $_POST['what'];
        $sql = 'select * from `user` where phone = "' . $phone . '"';
        $find = (new DB())->find($sql);

        $res=new stdClass();


        //判断是登入发送验证码还是注册发送验证码
        if ($what == 'reg') {
            if ($find) {
                $res->success=0;
                $res->msg='该号码已经注册了';
                echo json_encode($res);
                return;
            }
        } else if ($what == 'login') {
            if (!$find) {
                $res->success=0;
                $res->msg='发送失败,该号码还没注册';
                echo json_encode($res);
                return;
            }
        } else if ($what == 'psw') {
            if (!$find) {
                $res->success=0;
                $res->msg='发送失败,该号码还没注册';
                echo json_encode($res);
                return;
            }
        } else {
            $res->success=0;
            $res->msg='非法操作';
            echo json_encode($res);
            return;
        }

        //判端该手机号是否在一分钟内重复发送
        $sendPhones = session('sendPhones');
        if ($sendPhones) {
            foreach ($sendPhones as $value) {
                if ($value['phone'] == $phone && strtotime(date('y-m-d H:i:s')) - strtotime($value['time']) < 60) {
                    $res->success=0;
                    $res->msg='发送失败,该号码在一分钟内重复发送';
                    echo json_encode($res);
                    return;
                }
            }
        }

        $smscode = mt_rand(99999, 999999);
        $client = new  SmsService('https://sms_developer.zhenzikj.com', "101275", "3905025b-e034-4530-ae67-0aa2a4a1b36d");
        $result = $client->send($phone, '您的验证码为' . $smscode . '，有效时间为5分钟');

        //$result='{"code":0,"smscode":"'.$smscode.'"}';
        $json = json_decode($result);
        if ($json->code == 0) {
            $arr = array(
                'phone' => $phone,
                'smscode' => $smscode,
                'time' => date('y-m-d H:i:s'),
                'what' => $what
            );
            session('verifyInfo', $arr);
            //把已经发送的号码存入session中用来检测一分钟是否重复发送
            $sendPhones = session('sendPhones');
            if ($sendPhones) {
                $p = array('phone' => $phone, 'time' => $arr['time']);
                array_push($sendPhones, $p);
            } else {
                $p = array('phone' => $phone, 'time' => $arr['time']);
                $sendPhones = array($p);
            }
            session('sendPhones', $sendPhones);

            $res->success=1;
            $res->msg='发送成功';
            echo json_encode($res);
        } else {
            $res->success=0;
            $res->msg='发送失败,系统内部出错';
            echo json_encode($res);
        }
        return;
    }

    public function logout()
    {
        session(null);
        session_destroy();
        return redirect('/login');
    }

    public function register()
    {
        return view('app/users/register');
    }

    public function register_action()
    {
        $phone = $_POST['phone'];
        $sql = 'select * from `user` where phone = "' . $phone . '"';
        $result = (new DB())->find($sql);

        $res=new stdClass();
        if ($result) {
            $res->success=0;
            $res->msg='该手机号已经注册';
            echo json_encode($res);
        } else {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $smscode = $_POST['smscode'];

            $verifyInfo = session('verifyInfo');

            if ($verifyInfo && $verifyInfo['phone'] == $phone && $verifyInfo['smscode'] == $smscode && strtotime(date('y-m-d H:i:s')) - strtotime($verifyInfo['time']) < 300) {
                flash('verifyInfo');
                $result = (new DB())->save('user', ['phone' => $phone, 'username' => $username, 'password' => $password, 'create_time' => date('Y-m-d H:i:s')]);
                if ($result) {

                    $res->success=1;
                    $res->msg='注册成功';
                    echo json_encode($res);
                } else {

                    $res->success=0;
                    $res->msg='注册失败';
                    echo json_encode($res);
                }
            } else {

                $res->success=0;
                $res->msg='短信验证码错误';
                echo json_encode($res);
            }
        }
        return;
    }

    public function updatePsw()
    {

        $phone = $_POST['phone'];
        $sql = 'select * from `user` where phone = "' . $phone . '"';
        $db = new DB();
        $res=new stdClass();
        $result = $db->find($sql);
        if ($result) {
            $password = md5($_POST['password']);
            $smscode = $_POST['smscode'];

            $verifyInfo = session('verifyInfo');
            if ($verifyInfo && $verifyInfo['phone'] == $phone && $verifyInfo['smscode'] == $smscode && strtotime(date('y-m-d H:i:s')) - strtotime($verifyInfo['time']) < 300) {
                $sql = 'update `user` set password="' . $password . '" where phone="' . $phone . '"';
                $result = $db->query($sql);
                if ($result) {
                    $res->success=1;
                    $res->msg='修改密码成功';
                    echo json_encode($res);
                } else {
                    $res->success=0;
                    $res->msg='系统内部出错';
                    echo json_encode($res);
                }
            } else {
                $res->success=0;
                $res->msg='短信验证码出错';
                echo json_encode($res);
            }
        } else {
            $res->success=0;
            $res->msg='该手机号还没有注册';
            echo json_encode($res);
        }
        return;
    }

    public function updateinfo()
    {
        $userid = session('user')->id;
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        //$newpassword=md5($_POST['newpassword']);
        $password = md5($_POST['password']);


        $sql = 'update user set phone="' . $phone . '", username="' . $username . '",email="' . $email . '" where id=' . $userid . ' and password="' . $password . '"';
        $result = (new DB())->query($sql);
        if ($result) {
            $user = session('user');
            $user->phone = $phone;
            $user->username = $username;
            $user->email = $email;
            //$user->password=$password;
            echo json_encode('{"success":1,"msg":"修改成功,请刷新当前页面"}');
        } else {
            echo json_encode('{"success":0,"msg":"修改失败，当前密码输入错误"}');
        }
        return;
    }

    public function query()
    {
        $condition = $_POST['condition'];
        $db=new DB();
        if (preg_match("/^1[345678]{1}\d{9}$/", $condition)) {
            $sql='select id,phone,username from `user` where phone="'.$condition.'"';
            $result= $db->query($sql);
        } else {
            $sql='select id,phone,username from `user` where username like "%'.$condition.'%"';
            $result=$db->query($sql);
        }
        echo json_encode($result);
    }
}