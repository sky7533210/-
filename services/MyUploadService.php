<?php

class MyUploadService {
    private $fileInfo;

   public function check(){
       if(!(isset($_GET['resumableIdentifier']) && trim($_GET['resumableIdentifier'])!='')){
           $_GET['resumableIdentifier']='';
       }
       $temp_dir = 'assets/uploads/temp/'.$_GET['resumableIdentifier'];

       if(!(isset($_GET['resumableChunkNumber']) && trim($_GET['resumableChunkNumber'])!='')){
           $_GET['resumableChunkNumber']='';
       }
       $chunk_file = $temp_dir.'/'.$_GET['resumableIdentifier'].'.part'.$_GET['resumableChunkNumber'];
       if (file_exists($chunk_file)) {
           header("HTTP/1.0 200 Ok");
       } else {
           header("HTTP/1.0 204 No Content");
       }
       return;
   }

    public function upload()
    {
        if (!empty($_FILES)) foreach ($_FILES as $file) {
            // check the error status
            if ($file['error'] != 0) {
                continue;
            }
            // init the destination file (format <filename.ext>.part<#chunk>
            // the file is stored in a temporary directory
            if(isset($_POST['resumableIdentifier']) && trim($_POST['resumableIdentifier'])!=''){
                $temp_dir = 'assets/uploads/temp/'.$_POST['resumableIdentifier'];
            }
            $dest_file = $temp_dir.'/'.$_POST['resumableIdentifier'].'.part'.$_POST['resumableChunkNumber'];

            // create the temporary directory
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777, true);
            }

            // move the temporary file
            if (!move_uploaded_file($file['tmp_name'], $dest_file)) {
                dd('Error saving (move_uploaded_file) chunk '.$_POST['resumableChunkNumber'].' for file '.$_POST['resumableFilename']);
            } else {
                // check if all the parts present, and create the final destination file
                $this->createFileFromChunks($temp_dir, $_POST['resumableIdentifier'],$_POST['resumableFilename'], $_POST['resumableTotalSize'],$_POST['resumableTotalChunks']);
            }
        }
    }
    /**
     *
     * Delete a directory RECURSIVELY
     * @param string $dir - directory path
     * @link http://php.net/manual/en/function.rmdir.php
     */
    private function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir") {
                        $this->rrmdir($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }


    /**
     *
     * Check if all the parts exist, and
     * gather all the parts of the file together
     * @param string $temp_dir - the temporary directory holding all the parts of the file
     * @param string $fileName - the original file name
     * @param string $chunkSize - each chunk size (in bytes)
     * @param string $totalSize - original file size (in bytes)
     */
    private function createFileFromChunks($temp_dir, $fileId, $fileName, $totalSize,$total_files) {

        // count all the parts of this file
        $total_files_on_server_size = 0;
        $temp_total = 0;
        foreach(scandir($temp_dir) as $file) {
            $temp_total = $total_files_on_server_size;
            $tempfilesize = filesize($temp_dir.'/'.$file);
            $total_files_on_server_size = $temp_total + $tempfilesize;
        }
        // check that all the parts are present
        // If the Size of all the chunks on the server is equal to the size of the file uploaded.
        if ($total_files_on_server_size >= $totalSize) {
            // create the final destination file
            if (($fp = fopen('assets/uploads/'.$fileId, 'w')) !== false) {
                for ($i=1; $i<=$total_files; $i++) {
                    fwrite($fp, file_get_contents($temp_dir.'/'.$fileId.'.part'.$i));
                }
                fclose($fp);
                //计算文件的md5并改名
              $md5= md5_file('assets/uploads/'.$fileId);

              $pos= strrpos($fileName,'.');
                if($pos){
                    $type=substr($fileName,$pos);
                }else{
                    $type='';
                }
              rename('assets/uploads/'.$fileId,'assets/uploads/'.$md5.$type);
              $this->fileInfo=new stdClass();
              $this->fileInfo->md5=$md5;
              $this->fileInfo->size=$totalSize;
              $this->fileInfo->type=$type;
              $this->fileInfo->name=$fileName;

            } else {
                return false;
            }
            // rename the temporary directory (to avoid access from other
            // concurrent chunks uploads) and than delete it
            if (rename($temp_dir, $temp_dir.'_UNUSED')) {
                $this->rrmdir($temp_dir.'_UNUSED');
            } else {
                $this->rrmdir($temp_dir);
            }
        }

    }
    public function complete(){
        return $this->fileInfo;
    }

}
