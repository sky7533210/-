<?php

/**
 * Created by PhpStorm.
 * User: sky
 * Date: 2019/4/23
 * Time: 8:17
 */
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
        $user=session('user');
        return view('app/files/home', compact('username', 'files', 'dirs', 'parentid', 'paths', 'folderTree', 'fa', 'imgs', 'movies', 'ims', 'sounds','user'));
    }

    private function getFolderTree($v)
    {
        $sql = 'select id , name from `vir_file` where parent_id="' . $v->id . '" and type="-1" and isdel=0 and user_id='.session('user')->id;
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

    //获取文件列表
    private function fileList($parentid)
    {
        $db = new DB();
        $user = session("user");
        $dirs = $db->query('select id ,name ,create_time from `vir_file` where user_id=' . $user->id . ' and parent_id="' . $parentid . '" and type="-1" and isdel=0');

        $files = $db->query('select id ,name ,size ,type,md5,create_time from `vir_file` where user_id=' . $user->id . ' and parent_id="' . $parentid . '" and type!="-1" and isdel=0');

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
                $db->save('real_file', ['md5' => $fileInfo->md5, 'size' => $fileInfo->size, 'type' => $fileInfo->type, 'createTIme' => date('y-m-d H:i:s')]);
            }
            //把虚文件存入数据库中
            $result = $db->save('vir_file', ['user_id' => $user->id, 'md5' => $fileInfo->md5, 'name' => $fileInfo->name, 'size' => $fileInfo->size,
                'type' => $fileInfo->type, 'parent_id' => $_POST['parentid'], 'create_time' => date('y-m-d H:i:s')]);
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
                'type' => $type, 'parent_id' => $_POST['parentid'], 'create_time' => date('y-m-d H:i:s')]);
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
            'type' => '-1', 'parent_id' => $parentid, 'create_time' => date('y-m-d H:i:s')]);
        return redirect('/home?parentid=' . $parentid);
    }

    public function delete()
    {
        $parentid = $_GET['parentid'];
        $userid = session('user')->id;
        $ids = $_GET['ids'];
        $sql = 'update `vir_file` set isdel=1,del_time="'.date('y-m-d H:i:s').'" where user_id=' . $userid . ' and id in(' . $ids . ')';
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
                    'size' => $value->size, 'type' => $value->type, 'parent_id' => $destid, 'create_time' => date('y-m-d H:i:s')]);
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

}