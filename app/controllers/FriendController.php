<?php

/**
 * Created by PhpStorm.
 * User: sky
 * Date: 2019/6/8
 * Time: 22:35
 */
class FriendController extends Controller
{
    public function index(){

        $user= session('user');
        $sql='select id,username,phone from `friend` left join `user` on friend_id=id where userid='.$user->id;
        $db=new DB();
        $result1= $db->query($sql);

        $sql='select id,username,phone from `friend` left join `user` on userid=id where friend_id='.$user->id;
        $db=new DB();
        $result2= $db->query($sql);

        $friends=array_merge($result1,$result2);

        return view('app/friend/home',compact('friends','user'));
    }
    public function apply(){
        $userid=$_GET['userid'];
        $friendid=$_GET['friendid'];

        $response=new stdClass();
        if($userid==$friendid){
            $response->code=0;
            $response->msg='自己不能添加自己';
            echo json_encode($response);
            return;
        }
        //先判断是否已经是好友
        $sql='select * from `friend` where (userid='.$userid.' and friend_id='.$friendid.') or (userid='.$friendid.' and friend_id='.$userid.')';
        $db=new DB();

        if($db->find($sql)){
            $response->code=0;
            $response->msg='对方已经是你的好友';
            echo json_encode($response);
            return;
        }
        //插入好友关系表
        if($db->save('friend',['userid'=>$userid,'friend_id'=>$friendid,'create_time'=>date('y-m-d H:i:s')])){
            $response->code=1;
            $response->msg='添加好友成功';
        }else{
            $response->code=2;
            $response->msg='添加好友失败，内部错误';
        }
        echo json_encode($response);
    }
    public function delete($id){
        $myid= session('user')->id;
        $sql='delete from `friend` where (userid='.$myid.' and friend_id='.$id.') or (userid='.$id.' and friend_id='.$myid.')';
        (new DB())->query($sql);
        return redirect('/friend');
    }
}