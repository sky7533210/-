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
        $name=session('admin')->userid;
        $sql='select * from  `real_file`';
        $db=new DB();
        $files= $db->query($sql);
        $sql='select * from `user`';
        $users= $db->query($sql);
        return view('app/admin/home1',compact('name','files','users'));
    }
    public function welcome(){
        $name=session('admin')->userid;

        $db=new DB();
        $data=new stdClass();
        $sql='select count(*) count from `real_file`';
        $data->countfile=$db->find($sql)->count;

        $sql='select sum(size) size from `real_file`';
        $data->totalsize=$db->find($sql)->size;

        $sql='select count(*) count from `user`';
        $data->countuser=$db->find($sql)->count;

        $sql='select count(*) count from `vir_file` where type!="-1"';
        $data->countvirfile=$db->find($sql)->count;

        $sql='select sum(size) size from `vir_file` where type!="-1"';
        $data->totalvirsize=$db->find($sql)->size;

        $sql='select count(*) count from `share_file`';
        $data->countshare=$db->find($sql)->count;

        return view('app/admin/welcome',compact('name','data'));
    }
    public function memberlist(){
        return view('app/admin/member-list');
    }
    public function getmemberlist(){
        $page=intval($_POST['page'])-1;
        $limit=intval($_POST['limit']);
        $page=$page*$limit;
        $sql='select count(0) count from `user`';
        $count=(new DB())->find($sql)->count;
        $sql='select id,username,phone,email,create_time,status from `user` limit '.$page.','.$limit;
        $result= (new DB())->query($sql);
        $data=new stdClass();
        $data->code=0;
        $data->msg="";
        $data->count=$count;
        $data->data=$result;
        echo json_encode($data);
    }

    public function filelist(){
        return view('app/admin/file-list');
    }
    public function getfilelist(){
        $page=intval($_POST['page'])-1;
        $limit=intval($_POST['limit']);
        $page=$page*$limit;
        $sql='select count(0) count from `real_file`';
        $count=(new DB())->find($sql)->count;
        $sql='select * from `real_file` limit '.$page.','.$limit;
        $result= (new DB())->query($sql);
        $data=new stdClass();
        $data->code=0;
        $data->msg="";
        $data->count=$count;
        $data->data=$result;
        echo json_encode($data);
    }

    public function changeStatus(){
        $id=$_GET['id'];
        $status=$_GET['status'];
        $sql='update `user` set status='.$status.' where id='.$id ;
        (new DB())->query($sql);
    }
    public function logout(){
        session(null);
        session_destroy();
        return redirect('/admin/login');
    }
    public function memberEdit(){
        $sql='select * from `user` where id='.$_GET['id'];
        $user= (new DB())->find($sql);
        return view('app/admin/member-edit',compact('user'));
    }
    public function memberEditAction(){
        $id=$_POST['id'];
        $phone=$_POST['phone'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $sql='update `user` set phone="'.$phone.'",username="'.$username.'",email="'.$email.'" where id='.$id ;
        $result= (new DB())->query($sql);
        $response=new stdClass();
        if($result){
            $response->code=1;
            $response->msg='编辑成功';
        }
        else{
            $response->code=0;
            $response->msg='编辑失败';
        }
        echo json_encode($response);
    }
    public function memberQuery(){
        $start=$_POST['start'];
        $end=$_POST['end'];
        $username=$_POST['username'];

        $condition=' 1=1 ';
        if($start)
            $condition=$condition.' and create_time> "'.$start.'"';
        if($end)
            $condition=$condition.' and create_time< "'.$end.'"';
        if($username)
            $condition=$condition.' and username like "%'.$username.'%"';

        $page=intval($_POST['page'])-1;
        $limit=intval($_POST['limit']);
        $page=$page*$limit;
        $sql='select count(0) count from `user` where'.$condition;


        $count=(new DB())->find($sql)->count;

        $sql='select id,username,phone,email,create_time,status from `user` where '.$condition.' limit '.$page.','.$limit;
        $result= (new DB())->query($sql);
        $data=new stdClass();
        $data->code=0;
        $data->msg="";
        $data->count=$count;
        $data->data=$result;
        echo json_encode($data);

    }
    public function echartUser(){
        $db=new DB();
        $data=array();
        $startTime=time()-(intval(date('w')+6)*24*3600);

        for($i=0;$i<7;$i++){
            $sql='select count(0) count from `user` where create_time>"'.date("y-m-d",$startTime+$i*24*3600).'" and create_time<"'.date("y-m-d",$startTime+($i+1)*24*3600).'"';
            //d($sql);
            array_push( $data,intval( $db->find($sql)->count));
        }
        $data=json_encode($data);

        $data1=array();
        $startTime=strtotime( date('y-m-d',strtotime('-1 day')) );

        for($i=0;$i<12;$i++){
            $sql='select count(0) count from `user` where create_time>"'.date("y-m-d H",$startTime+$i*7200).'" and create_time<"'.date("y-m-d H",$startTime+($i+1)*7200).'"';
            //d($sql);
            array_push( $data1,intval( $db->find($sql)->count));
        }
        $data1=json_encode($data1);

        return view('app/admin/echarts-user',compact('data','data1'));
    }
}