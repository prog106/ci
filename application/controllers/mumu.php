<?php
class Mumu extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('adinfo', 'adinfo');
        $this->load->model('mumug', 'mumug');
        $this->load->helper('url');
    }
    function index() {
        $common['title'] = "MuMug";
        $this->load->view('_head', $common);

        $nowdate = date('Y-m-d');
        $where = " mu_create_date LIKE '".$nowdate."%' AND mu_viewyn = 'y'";
        $order = " mu_yes DESC, mu_no ASC, mu_id DESC";
        $limit['start'] = "0";
        $limit['cnt'] = "10";
        $data['lists'] = $this->mumug->mu_list($where, $order, $limit);
        $this->load->view('mumu/index', $data);

        $this->load->view('_footer', $common);
    }
    function commentinsert() {
        $input_array = array('comment', 'eater');
        foreach($input_array as $k) {
            $param['mu_'.$k] = $this->input->post($k);
        }

        $param['mu_create_date'] = date('Y-m-d H:i:s');

        $result = $this->mumug->mu_insert($param);
        $msg = ($result)? "Comment Success!" : "Comment False! Retry!";
        echo json_encode($msg);
    }
    function viewcomment() {
        echo $_POST['srl'];
    }
}
?>
