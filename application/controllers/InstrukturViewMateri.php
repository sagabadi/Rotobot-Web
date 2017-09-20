<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrukturViewMateri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function show($id) {
        $karyawan = $this->db->query("Select *from materi where id_materi='$id'");
        $data['materi'] = $karyawan;
        $this->load->view('instruktur_view_materi.html', $data);
    }

}
