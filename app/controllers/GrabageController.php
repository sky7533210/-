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
        $sql='select name,size,del_time from `vir_file` where user_id='.$userid.' and isdel=1 order by del_time';
        $db=new DB();
        $grabages= $db->query($sql);

        return view('app/grabage/index', compact('username','grabages'));
    }
}