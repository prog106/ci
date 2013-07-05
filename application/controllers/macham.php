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

        $data['comments'] = $this->mumug->mu_list('', 'mu_id desc', array('start' => 0, 'cnt' => 10));
        $data['calendar'] = calendar();
        $common['title'] = "Macham";
        $this->load->view('macham/_head', $common);

        $this->load->view('macham/main', $data);

        $this->load->view('macham/_footer', $common);
    }
    function commentinsert() {
        $input_array = array('title', 'comment', 'eater', 'imagesrc');
        foreach($input_array as $k) {
            $param['mu_'.$k] = $this->input->post($k);
        }

        $param['mu_create_date'] = date('Y-m-d H:i:s');

        $result = $this->mumug->mu_insert($param);
        $msg = ($result)? "Comment Success!" : "Comment False! Retry!";
        echo json_encode($msg);
    }
    function viewcomment() {
        $where = " mu_id = ? AND mu_viewyn = 'y'";
        $param[] = $this->input->post('srl');
        if(empty($param)) die;
        $lists = $this->mumug->mu_comment($where, $param);
        $data['row'] = $lists[0];
        $this->load->view('macham/view', $data);
    }
    function viewmore() {
        $page = $this->input->post('moreno');
        if(empty($page)) die;
        $start = $page * 10;
        $data['comments'] = $this->mumug->mu_list('', 'mu_id desc', array('start' => $start, 'cnt' => 10));
        $this->load->view('macham/more', $data);
    }
    function calendars() {
        $month = $this->input->post('month');
        $this->load->helper('common');
        echo calendar($month);
    }
}
?>
