<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaUbahProfil extends CI_Controller {

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
        $name = $this->db->query("Select username from siswa where username = '$nama'")->num_rows();
        $data['title'] = "This is Profil";
        if ($name > 0) {
            $this->load->view('siswa_ubah_profil.html', $data);
        } else {
            redirect('login');
        }
    }

}
