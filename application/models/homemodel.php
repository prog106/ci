<?php
class Homemodel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getlist() {
        $query = "SELECT * FROM dental ORDER BY md_id DESC";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    function save($param) {
        $result = $this->db->insert('ad', $param);
        return $result;
    }

    function _ad_modify($param) {
        $this->db->where('id', $param['id']);
        unset($param['id']);
        $result = $this->db->update('ad', $param);
        return $result;
    }
}
?>
