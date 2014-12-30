<?php
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        //$this->load->model('Homemodel', 'model');
    }

    function follow($file)
    {
        $size = 0;
        while (true) {
            clearstatcache();
            $currentSize = filesize($file);
            if ($size == $currentSize) {
                usleep(100000);
                flush();
                continue;
            }

            $fh = fopen($file, "r");
            fseek($fh, $size);
            echo "<pre>";
            while ($d = fgets($fh)) {
                echo $d;
            }
            echo "</pre>";

            fclose($fh);
            $size = $currentSize;
        }
    }

    function index() {
        //self::follow("out.txt");
        echo "home";
        die;
        echo "this";
        echo "what is". PHP_EOL;
        die;
        $out = shell_exec("ls &> out.txt");
        $fo = fopen("out.txt", "r");
        $out = fread($fo,10240);
        echo "<body style=\"background-color:#000\">";
        echo "<pre style=\"color:#FFF\">";
        echo $out;
        echo "</pre>";
        echo "</body>";
        die;
        $a = "124536";
        for($i=0;$i<strlen($a);$i++) {
            $b[] = $a[$i];
        }
        print_r($b);
        //echo "1";
        //$result = $this->model->getlist();
        //$result = $this->baba->getList();
        //$this->load->view('home/main');
        //$this->load->view('home/home');
        //$this->load->view('home/head');
        //$this->load->view('home/qa');
        $t = file_get_contents("http://www.naver.com/");
        $out = strip_tags($t);
        print_r($out);
    }
    function save() {
        print_r($this->input->post('comments'));
    }
    function uploadimg() {

    }
    function youtb() {
        //$command = "df -h";
        //$feedback = shell_exec($command);
        //$this->common->debug($feedback);
        $this->load->view('home/youtb');
    }
    function rec() {
        $data['photo'] = 1; //$this->input->post('photo_tmp');
        $data['comments'] = $this->input->post('comments');

        $result = $this->baba->exeComment($data);
        $return = "OK";
        if(!$result) $return = "NOK";
        return $return;
    }
}
?>
