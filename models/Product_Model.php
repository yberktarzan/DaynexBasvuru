<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    var $table = 'products';
    

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    private function _get_datatables_query() {
        $this->db->from($this->table);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_datatables() {
        $query = $this->_get_datatables_query();
        return $query->result();
    }

    public function count_filtered() {
        $query = $this->_get_datatables_query();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }





}
