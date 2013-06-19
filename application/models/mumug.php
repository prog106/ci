<?php
class Mumug extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function mu_list($where='', $order='', $limit='') {
        $query = "SELECT * FROM mumug";
        $query .= (!empty($where))? " WHERE ". $where : '';
        $query .= (!empty($order))? " ORDER BY ".$order : '';
        $query .= (!empty($limit))? " LIMIT ".$limit['start'].", ".$limit['cnt'] : '';
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    function mu_insert($param) {
        $result = $this->db->insert('mumug', $param);
        return $result;
    }

}
?>
