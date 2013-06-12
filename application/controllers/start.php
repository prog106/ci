<?php
class Start extends CI_Controller {
    function index() {
        $data['title'] = "AD for U";
        $this->load->view('_head', $data);
        $this->load->view('_footer', $data);
    }
}
?>
