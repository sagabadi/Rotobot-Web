<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUbahProfil extends CI_Controller {

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
        $name = $this->db->query("Select username from karyawan where id_karyawan = '$id'")->num_rows();
        $data['title'] = "This is Profil";
        if ($name > 0) {
            $this->load->view('admin_ubah_profil.html', $data);
        } else {
            redirect('login');
        }
    }

}
