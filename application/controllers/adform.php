<?php
class Adform extends CI_Controller {
    function index() {
        $data['title'] = "AD add";
        $this->load->view('_head', $data);
        $this->load->view('_footer', $data);
    }
}
?>
