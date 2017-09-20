<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminJadwal extends CI_Controller {

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
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $jadwal = $this->db->query("Select * from jadwal");
        if ($name > 0) {
            $data['title'] = "This is Home";
            $data['jadwal'] = $jadwal;
            $this->load->view('admin_tambah_jadwal.html', $data);
        } else {
            redirect('login');
        }
    }

}
