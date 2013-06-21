<?php
class Mumug extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function mu_list($where='', $order='', $limit='', $param=array()) {
        $query = "SELECT * FROM mumug";
        $query .= (!empty($where))? " WHERE ". $where : '';
        $query .= (!empty($order))? " ORDER BY ".$order : '';
        $query .= (!empty($limit))? " LIMIT ".$limit['start'].", ".$limit['cnt'] : '';
        $result = $this->db->query($query, $param)->result_array();
        return $result;
    }

    function mu_insert($param) {
        $result = $this->db->insert('mumug', $param);
        return $result;
    }

    function reply_list($where='', $order='', $limit='', $param=array()) {
        $query = "SELECT * FROM mumug_reply";
        $query .= (!empty($where))? " WHERE ". $where : '';
        $query .= (!empty($order))? " ORDER BY ".$order : '';
        $query .= (!empty($limit))? " LIMIT ".$limit['start'].", ".$limit['cnt'] : '';
        $result = $this->db->query($query, $param)->result_array();
        return $result;
    }
}
?>