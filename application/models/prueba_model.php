<?php

class Prueba_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function prueba() {
        $query = $this->db->get('tabla');

        return $query->result_Array();
    }

}
