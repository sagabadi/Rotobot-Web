<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CetakDataKaryawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $karyawan = $this->db->query("Select * from karyawan where not jabatan like 'Instruktur%'");
        $data['karyawan'] = $karyawan;
        $this->load->view('cetak_data_karyawan.html', $data);
    }

}
