<?php
class Imgctrl extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
        $this->imageinsert();
    }
    function imageinsert() {
        $time = time();
        $savefolder = "/home/prog106/ci/static/upload/";
        $checktoken = md5('prog106'.$_POST['timestamp']);
        if(!empty($_FILES) && $_POST['token'] == $checktoken) {
            $tmpfile = $_FILES['Filedata']['tmp_name'];
            $fileTypes = array('jpg', 'gif', 'png');
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $savefilename = md5('img'.$time).".".$fileParts['extension'];

            if(in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tmpfile, '/home/prog106/ci/static/upload/'.$savefilename);
                echo $savefilename;
            } else {
                echo "Check File Type, Please";
            }
        }
    }
}
?>