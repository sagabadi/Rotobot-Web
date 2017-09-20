<?php

defined('BASEPATH') OR exit('No direct script allowed');

class DetailInstruktur extends CI_Model {

    public function __construct() {

        parent::__construct();

        }

        public function listInstruktur() {

        $query = $this->db->query("Select * from karyawan where jabatan = 'Instruktur'");
        return $query->result_array;
    }

    public function detail($id) {

        $query = $this->db->query("Select * from karyawan where id = $id");
        return $query->result_array();
    }

}
