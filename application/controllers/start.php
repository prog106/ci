<?php
class Start extends CI_Controller {
	function __construct() {
        parent::__construct();
        //$this->load->model('myspinfo', 'myspinfo');
        //$this->load->helper('url');
    }
    function index() {
    	$this->load->view('start/_head');
    	$this->load->view('start/main');
//        header('Location: /hope');
//        header('Location: /mumu');
//        header('Location: /macham');
//        header('Location: /baby');
//        header('Location: /mysp');
//        header('Location: /welcome/rss');
    }
}
?>
