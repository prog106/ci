<?php
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
        $this->load->view('home/head');
    }
    function youtb() {
        //$command = "df -h";
        //$feedback = shell_exec($command);
        //$this->common->debug($feedback);
        $this->load->view('home/youtb');
    }
}
?>
