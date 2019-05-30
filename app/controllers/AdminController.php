<?php

/**
 * Created by PhpStorm.
 * User: sky
 * Date: 2019/5/14
 * Time: 17:14
 */
class AdminController extends Controller
{
    protected $access_control = true;//设置是否开启访问权限控制，如要开启必须设置

    protected $accessible_list = [
        'login','login_check'
    ];//设置允许未登录访问的操作（即控制器中的方法）

    protected $login_identifier = 'admin';//设置session中的登录检测标识，根据编码设置

    protected $login_route = '/admin/login';//设置未允许访问时跳转的登录页面，根据路由设置

    public function login()
    {
        if (session('admin')) {
            return redirect('/admin/home');
        }
        return view('app/admin/login');
    }

    public function login_check()
    {
        //检验数据的有效性 //保证系统数据的安全健壮
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        //用户名和密码不能为空
        if (empty($userid) || empty($password)) {
            echo json_encode("{success:0,msg:'用户名或密码为空'}");
            return;
        }
        if ($userid == 'admin' && $password == 'admin') {
            $admin=new stdClass();
            $admin->userid='admin';
            $admin->password='admin';
            session('admin', $admin);
            echo json_encode("{success:1,msg:'登录成功'}");
        } else {
            echo json_encode("{success:0,msg:'用户名或密码不正确'}");
        }
        return;

    }
    public function index()
    {

        $sql='select * from  `real_file`';
        $db=new DB();
        $files= $db->query($sql);
        $sql='select * from `user`';
        $users= $db->query($sql);
        return view('app/admin/home',compact('files','users'));
    }
    public function logout(){
        session(null);
        session_destroy();
        return redirect('/admin/login');
    }
}