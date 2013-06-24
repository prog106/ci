<?php
class Macham extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('adinfo', 'adinfo');
        $this->load->model('mumug', 'mumug');
        $this->load->helper('url');
    }
    function index() {
        $this->load->helper('common');
        $data['calendar'] = calendar('2013', '7', '2');
        $common['title'] = "Macham";
        $this->load->view('macham/_head', $common);

        $this->load->view('macham/main', $data);

        $this->load->view('macham/_footer', $common);
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
    function viewhtml() {
        echo "<table id='view'><tr><td>Hey Here</td><tr></table>";
    }
    function viewcomment() {
        $common['title'] = "MaCham";
        $this->load->view('_head', $common);

        $where = " mu_id = ? AND re_viewyn = 'y'";
        $order = " re_yes DESC, re_no ASC, re_id DESC";
        $param[] = $this->input->post('srl');
        $limit['start'] = "0";
        $limit['cnt'] = "30";
        $data['lists'] = $this->mumug->reply_list($where, $order, $limit, $param);
        $rewhere = " mu_id = ? AND mu_viewyn = 'y'";
        $reorder = '';
        $relimit = '';

        $maincomment = $this->mumug->mu_list($rewhere, $reorder, $relimit, $param);
        $data['maincomment'] = $maincomment[0];
        
        $this->load->view('mumu/content', $data);

        $this->load->view('_footer', $common);
    }
}
?>
