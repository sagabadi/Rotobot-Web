<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $name = $this->db->query("Select username from siswa where nama = '$nama1'")->num_rows();
        $jadwal = $this->db->query("Select hari, jam from jadwal where id_siswa = $id");
        $data['title'] = "This is Home";
        if ($name > 0) {
            $data['jadwal'] = $jadwal;
            $this->load->view('siswa_dashboard', $data);
        }
        else {
            redirect ('login');
        }
    }

}
