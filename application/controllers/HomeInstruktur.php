<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeInstruktur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $id = $this->session->userdata('ids');
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        if ($name > 0) {
            $data['title'] = "This is Home";
            $this->load->view('instruktur_dashboard.html', $data);
        } else {
            redirect ('login');
        }
    }

}
