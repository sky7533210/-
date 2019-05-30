<?php

/**
 * Created by PhpStorm.
 * User: sky
 * Date: 2019/4/23
 * Time: 8:17
 */
/*@if($file->type=='.mp3') href="javascript: alert(1111);"
                                   @elseif($file->type=='.mp4') href="javascript: alert(222);"
                                   @elseif($file->type=='.jpg') href="javascript: alert(333);"
                                   @else href="javascript: alert(444);"
                                   @endif*/

class FilesController extends Controller
{
    protected $access_control = true;//设置是否开启访问权限控制，如要开启必须设置

    protected $accessible_list = [
        'shareView','downloadShare','checkPass'
    ];//设置允许未登录访问的操作（即控制器中的方法）

    protected $login_identifier = 'user';//设置session中的登录检测标识，根据编码设置

    protected $login_route = '/login';

    private $fontAwesome = ['' => 'fa-file-o', '.mp3' => '	fa-file-audio-o', '.zip' => 'fa-file-archive-o', '.rar' => 'fa fa-file-zip-o',
        '.7z' => 'fa-file-archive-o', '.php' => 'fa-file-code-o', '.java' => 'fa-file-code-o', '.jpg' => 'fa-file-image-o', '.png' => 'fa-file-image-o',
        '.mp4' => 'fa-video-camera', '.txt' => 'fa-file-text-o', '.sql' => 'fa-file-code-o','.jsp'=>'fa-file-code-o','.pdf'=>'fa-file-o'];

    private $imgArr = ['.png', '.jpg'];
    private $movieArr = ['.mp4'];
    private $soundArr = ['.mp3'];

    public function index()
    {
        if (array_key_exists('parentid', $_GET)) {
            $parentid = $_GET['parentid'];
        } else {
            $parentid = '0';
        }
        $info = $this->fileList($parentid);
        $username = $info->username;
        $files = $info->files;
        $dirs = $info->dirs;
        $paths = $info->paths;

        $folderTree = session('folderTree');
        if (!$folderTree) {
            $v = new stdClass();
            $v->id = '0';
            $folderTree = $this->getFolderTree($v);
        }
        $fa = $this->fontAwesome;
        $imgs = $this->imgArr;
        $movies = $this->movieArr;
        $ims = array_merge($this->imgArr, $this->movieArr);
        $sounds = $this->soundArr;
        return view('app/files/home', compact('username', 'files', 'dirs', 'parentid', 'paths', 'folderTree', 'fa', 'imgs', 'movies', 'ims', 'sounds'));
    }

    private function getFolderTree($v)
    {
        $sql = 'select id , name from `vir_file` where parent_id="' . $v->id . '" and type="-1"';
        $db = new DB();
        $result = $db->query($sql);
        if (!$result) {
            $v->next = null;
            return;
        }
        $v->next = $result;
        foreach ($result as $value) {
            $this->getFolderTree($value);
        }
        return $result;
    }
    public function myShare(){
        $username=session('user')->username;
        $userid=session('user')->user_id;
        $sql='select * from `share_file` where user_id='.$userid;
        $db=new DB();
        $db->query($sql);


        return view('app/files/myshare',compact('username'));
    }

    public function grabage(){
        $username=session('user')->username;
        $userid=session('user')->id;
        //$sql='select * from `share_file` where user_id='.$userid;
        //$db=new DB();
       // $db->query($sql);

        return view('app/files/grabage',compact('username'));
    }

    //获取文件列表
    private function fileList($parentid)
    {
        $db = new DB();
        $user = session("user");
        $dirs = $db->query('select id ,name ,create_time from `vir_file` where user_id=' . $user->id . ' and parent_id="' . $parentid . '" and type="-1"');

        $files = $db->query('select id ,name ,size ,type,md5,create_time from `vir_file` where user_id=' . $user->id . ' and parent_id="' . $parentid . '" and type!="-1"');

        $info = new stdClass();
        $info->username = $user->username;
        $info->dirs = $dirs;
        $info->files = $files;

        $paths = array();
        $db = new DB();
        while ($parentid != '0') {
            $sql = 'select id,name,parent_id as parentid from `vir_file` where id="' . $parentid . '"';
            $result = $db->query($sql);
            array_push($paths, $result[0]);
            $parentid = $result[0]->parentid;
        }
        $info->paths = array_reverse($paths);
        return $info;
    }


    //get 请求用于校验此块是否已经上传
    public function checkUpload()
    {
        $uploadService = new MyUploadService();
        $uploadService->check();
        return;
    }

    //上传
    public function upload()
    {
        $uploadService = new MyUploadService();
        $uploadService->upload();

        $fileInfo = $uploadService->complete();
        if (!empty($fileInfo)) {
            $db = new DB();
            $user = session('user');
            //防止别人串改请求的md5
            $sql = 'select * from `real_file` where md5="' . $fileInfo->md5 . '"';
            if (!$db->find($sql)) {
                //不存在该文件，需要存实文件
                $db->save('real_file', ['md5' => $fileInfo->md5, 'size' => $fileInfo->size, 'type' => $fileInfo->type, 'createTIme' => date('y-m-d h:i:s')]);
            }
            //把虚文件存入数据库中
            $result = $db->save('vir_file', ['user_id' => $user->id, 'md5' => $fileInfo->md5, 'name' => $fileInfo->name, 'size' => $fileInfo->size,
                'type' => $fileInfo->type, 'parent_id' => $_POST['parentid'], 'create_time' => date('y-m-d h:m:s')]);
        }
        return;
    }

    public function checkMd5()
    {
        $md5 = $_POST['md5'];
        $sql = 'select * from `real_file` where md5="' . $md5 . '"';
        $db = new DB();
        if ($db->find($sql)) {
            //无需上传,但需要保存虚拟文件
            $user = session('user');
            $name = $_POST['name'];
            $size = $_POST['size'];


            $pos = strrpos($name, '.');
            if ($pos) {
                $type = substr($name, $pos);
            } else {
                $type = '';
            }
            $db->save('vir_file', ['user_id' => $user->id, 'md5' => $md5, 'name' => $name, 'size' => $size,
                'type' => $type, 'parent_id' => $_POST['parentid'], 'create_time' => date('y-m-d h:m:s')]);
            $json = '{"code":0}';
        } else {
            $json = '{"code":1}';  //要上传
        }
        echo json_encode($json);
        return;
    }

    public function createDir()
    {
        $parentid = $_POST['parentid'];
        $userdir = $_POST['userdir'];
        $user = session('user');
        (new DB())->save('vir_file', ['user_id' => $user->id, 'name' => $userdir,
            'type' => '-1', 'parent_id' => $parentid, 'create_time' => date('y-m-d h:m:s')]);
        return redirect('/home?parentid=' . $parentid);
    }

    public function delete()
    {
        $parentid = $_GET['parentid'];
        $userid = session('user')->id;
        if (array_key_exists('id', $_GET)) {
            $id = $_GET['id'];
            $sql = 'delete from `vir_file` where user_id=' . $userid . ' and id=' . $id;
        } else {
            $ids = $_GET['ids'];
            $sql = 'delete from `vir_file` where user_id=' . $userid . ' and id in(' . $ids . ')';
            (new DB())->query($sql);
            echo 'ok';
            return;
        }
        (new DB())->query($sql);
        return redirect('/home?parentid=' . $parentid);
    }

    public function rename()
    {
        $parentid = $_POST['thisdir'];
        $newname = $_POST['newname'];
        $oldname = $_POST['oldname'];
        $userid = session('user')->id;
        $id = $_POST['thisid'];
        if ($newname != $oldname) {
            $sql = 'update `vir_file` set name="' . $newname . '" where user_id=' . $userid . ' and id=' . $id;
            (new DB())->query($sql);
        }
        redirect('/home?parentid=' . $parentid);
    }

    public function move()
    {
        $id = $_POST['setmove'];
        $destid = $_POST['dest'];
        $userid = session('user')->id;

        $db = new DB();
        if (array_key_exists('copy', $_POST) && $_POST['copy'] == '1') { //复制
            $sql = 'select * from `vir_file` where user_id=' . $userid . ' and id in(' . $id . ')';
            $result = $db->query($sql);
            foreach ($result as $value) {
                $db->save('vir_file', ['user_id' => $userid, 'md5' => $value->md5, 'name' => $value->name,
                    'size' => $value->size, 'type' => $value->type, 'parent_id' => $destid, 'create_time' => date('y-m-d h:m:s')]);
            }
        } else { //移动
            $sql = 'update `vir_file` set parent_id="' . $destid . '" where user_id=' . $userid . ' and id in (' . $id . ')';
            $db->query($sql);
        }
        echo 'ok';
        return;
    }

    public function download($id)
    {
        $id = base64_decode($id);
        $userid = session('user')->id;
        $sql = 'select * from `vir_file` where user_id=' . $userid . ' and id=' . $id;
        $db = new DB();
        $virFile = $db->find($sql);
        if (array_key_exists('a', $_GET) && $_GET['a'] == 'dl'){
            $stream = new FileDownloadService('assets/uploads/' . $virFile->md5 . $virFile->type, $virFile->name, true);
        }
        else
            $stream = new FileDownloadService('assets/uploads/' . $virFile->md5 . $virFile->type);
        $stream->start();
    }

    public function downloadShare($id){
        $id = base64_decode($id);
        $sql = 'select * from `vir_file` where id=' . $id;
        $db = new DB();
        $virFile = $db->find($sql);
        $stream = new FileDownloadService('assets/uploads/' . $virFile->md5 . $virFile->type, $virFile->name, true);
        $stream->start();
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
                $endtime=strtotime('+10 year');
                break;
        }
        $db->save('share_file', ['keyw' => $keyw, 'user_id' => $userid, 'end_time' => date('y-m-d h:m:s',$endtime), 'password' => $password, 'vir_ids' => $virids]);
        echo base64_encode($this->xor_enc($keyw, 'sky'));
        return;
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
                $fa = $this->fontAwesome;
                return view('app/files/share', compact('files', 'fa','username'));
            } else {
                $id_= session('isPass');
                if($id_&&$id_==$keyw) {
                    $sql = 'select id,name,size,type from `vir_file` where id in (' . $virFile->vir_ids . ')';
                    $files = $db->query($sql);
                    $fa = $this->fontAwesome;
                    return view('app/files/share', compact('files', 'fa', 'username'));
                }
                else
                    return view('app/files/sharePass', compact('keyw1','username'));
            }
        }else{
            return view('app/files/error');
        }
    }

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