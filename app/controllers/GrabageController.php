<?php

/**
 * Created by PhpStorm.
 * User: sky
 * Date: 2019/6/1
 * Time: 1:52
 */
class GrabageController extends Controller
{
    public function index()
    {
        $username = session('user')->username;
        $userid = session('user')->id;
        $sql='select id, name,size,del_time from `vir_file` where user_id='.$userid.' and isdel=1 order by del_time';
        $db=new DB();
        $grabages= $db->query($sql);
        return view('app/grabage/index', compact('username','grabages'));
    }
    public function delete(){
        $ids= $_GET['ids'];
        $userid = session('user')->id;
        $sql='delete from `vir_file` where user_id="'.$userid.'" and isdel=1 and id in('.$ids.')';
        $db=new DB();
        $result= $db->query($sql);
        if($result)
            session('grabage','删除成功');
        else
            session('grabage','删除失败');
        return redirect('/grabage');
    }
    public function restore(){
        $ids= $_GET['ids'];
        $userid = session('user')->id;
        $sql='update `vir_file` set isdel=0 where user_id='.$userid.' and id in ('.$ids.')';
        $db=new DB();
        $result= $db->query($sql);
        if($result)
            session('grabage','还原成功');
        else
            session('grabage','还原失败');
        return redirect('/grabage');
    }
}