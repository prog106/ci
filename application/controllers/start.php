<?php
class Start extends CI_Controller {
	function __construct() {
        parent::__construct();
        //$this->load->model('myspinfo', 'myspinfo');
        //$this->load->helper('url');
    	$this->load->view('start/_head');
        $this->load->view('start/menu');
    }
    function index() {
        $this->load->view('start/main');
        if(BROWSER_TYPE == 'W') {
            echo "<!-- W -->";
        } else if(BROWSER_TYPE == 'M') {
            echo "<!-- M -->";
        }
    }
    function like() {
        $this->load->view('start/like');
    }
    function love() {
        $this->load->view('start/love');
    }
    function health() {
        $this->load->view('start/health');
    }
    function favorite() {
        $this->load->view('start/favorite');
    }
}
?>
