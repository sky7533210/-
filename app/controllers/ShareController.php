<?php

/**
 * Created by PhpStorm.
 * User: sky
 * Date: 2019/6/1
 * Time: 1:14
 */
class ShareController extends Controller
{
    protected $access_control = true;//设置是否开启访问权限控制，如要开启必须设置

    protected $accessible_list = [
        ''
    ];//设置允许未登录访问的操作（即控制器中的方法）

    protected $login_identifier = 'user';//设置session中的登录检测标识，根据编码设置

    protected $login_route = '/login';

    private $fontAwesome = ['' => 'fa-file-o', '.mp3' => '	fa-file-audio-o', '.zip' => 'fa-file-archive-o', '.rar' => 'fa fa-file-zip-o',
        '.7z' => 'fa-file-archive-o', '.php' => 'fa-file-code-o', '.java' => 'fa-file-code-o', '.jpg' => 'fa-file-image-o', '.png' => 'fa-file-image-o',
        '.mp4' => 'fa-video-camera', '.txt' => 'fa-file-text-o', '.sql' => 'fa-file-code-o','.jsp'=>'fa-file-code-o','.pdf'=>'fa-file-o'];

    public function index(){
        $username=session('user')->username;
        $userid=session('user')->id;
        $sql='select * from `share_file` where user_id='.$userid.' order by start_time desc';
        $db=new DB();
        $shares= $db->query($sql);

        foreach ($shares as $share){
            $ids=explode(',',$share->vir_ids);
            $sql='select name from `vir_file` where id='.$ids[0];
            $result=$db->find($sql);
            if($result) {
                $name = $result->name;
                if (count($ids) > 1)
                    $name = $name . '...等';
            }else {
                $name = '分享的文件已被删除';
            }
            $share->name = $name;

            if($share->keyw=='')
                $share->keyw='无';
            if( strtotime($share->end_time)-time()>10*365*24*3600 )
                $share->end_time='永久';
            //计算链接地址
            $share->url= 'http://www.p.com/share/'.base64_encode($this->xor_enc($share-> keyw, 'sky'));
        }
        return view('app/share/index',compact('username','shares'));
    }


    public function shareView($keyw1)
    {
        $keyw = $this->xor_enc(base64_decode($keyw1), 'sky');
        $sql = 'select * from `share_file` where keyw="' . $keyw . '"';
        $db = new DB();
        $virFile = $db->find($sql);

        if($virFile&&strtotime($virFile->end_time)>time()){
            $sql='select username from `user` where id='.$virFile->user_id;
            $user = $db->find($sql);
            $username=$user->username;
            if ($virFile->password == '') {
                //查出分享的列表
                $sql = 'select id,name,size,type from `vir_file` where id in (' . $virFile->vir_ids . ')';
                $files = $db->query($sql);
                $sql='update `share_file` set views=views+1 where keyw="'.$keyw.'"';
                $db->query($sql);

                $fa = $this->fontAwesome;
                $keyw=$keyw1;
                return view('app/files/share', compact('files', 'fa','username','keyw'));
            } else {
                $id_= session('isPass');
                if($id_&&$id_==$keyw) {
                    $sql = 'select id,name,size,type from `vir_file` where id in (' . $virFile->vir_ids . ')';
                    $files = $db->query($sql);

                    $sql='update `share_file` set views=views+1 where keyw="'.$keyw.'"';
                    $db->query($sql);

                    $fa = $this->fontAwesome;
                    $keyw=$keyw1;
                    return view('app/share/share', compact('files', 'fa', 'username','keyw'));
                }
                else
                    return view('app/share/sharePass', compact('keyw1','username'));
            }
        }else{
            return view('app/files/error');
        }
    }

    //生成一个keyw把它异或加密一下，再base64编码
    public function createShareLink()
    {
        $virids = $_POST['atts'];
        $limitTime = $_POST['time'];
        $userid = session('user')->id;
        $password = '';
        if (array_key_exists('pass', $_POST))
            $password = $_POST['pass'];
        $db = new DB();
        $keyw = uniqid();
        switch ($limitTime){
            case '1':
                $endtime=strtotime('+1 day');
                break;
            case '2':
                $endtime=strtotime('+7 day');
                break;
            case '3':
                $endtime=strtotime('+15 year');
                break;
        }
        $db->save('share_file', ['keyw' => $keyw, 'user_id' => $userid,'start_time'=>date('y-m-d h:m:s') , 'end_time' => date('y-m-d h:m:s',$endtime), 'password' => $password, 'vir_ids' => $virids]);
        echo base64_encode($this->xor_enc($keyw, 'sky'));
        return;
    }

    //下载
    public function download($id){
        $id = base64_decode($id);
        $keyw=  $this->xor_enc(base64_decode($_GET['keyw']), 'sky');
        $sql = 'select vir_ids from `share_file` where keyw="' .$keyw.'"';
        $db = new DB();
        $result= $db->find($sql);

        if(strstr( $result->vir_ids,$id)){
            //更新分享文件的下载次数
            $sql='update `share_file` set downloads=downloads+1 where keyw="'.$keyw.'"';
            $db->query($sql);

            $sql = 'select * from `vir_file` where id=' . $id;
            $virFile = $db->find($sql);
            $stream = new FileDownloadService('assets/uploads/' . $virFile->md5 . $virFile->type, $virFile->name, true);
            $stream->start();
        }else{
            echo "非法操作";
        }
    }

    public function cancle(){
        $ids=$_GET['ids'];
        $userid=session('user')->id;
        $sql='delete from `share_file` where id in ('.$ids.') and user_id='.$userid;
        $result= (new DB())->query($sql);
        if($result)
            session('share','取消成功');
        else
            session('share','取消失败');
        return redirect('/share/home');
    }


    //验证分享的提取码是否
    public function checkPass($keyw1)
    {
        $pwd = $_POST['pwd'];
        $keyw = $this->xor_enc(base64_decode($keyw1), 'sky');
        $sql = 'select * from `share_file` where keyw="' . $keyw . '" and password="' . $pwd . '"';
        $db = new DB();
        $virFile = $db->find($sql);
        if ($virFile) {
            //查出分享的列表
            session('isPass',$keyw);
            echo json_encode('{"code":1}');
            return;
        } else {
            echo json_encode('{"code":0}');
            return;
        }
    }
//异或加密
    function xor_enc($str, $key)
    {
        $crytxt = '';
        $keylen = strlen($key);
        for ($i = 0; $i < strlen($str); $i++) {
            $k = $i % $keylen;
            $crytxt .= $str[$i] ^ $key[$k];
        }
        return $crytxt;
    }
}