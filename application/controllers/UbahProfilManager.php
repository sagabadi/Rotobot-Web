<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UbahProfilManager extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('MUbahProfilSiswa');
    }

    public function index() {
        $id = $this->session->userdata('ids');
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $data['title'] = "This is Profil";
        if ($name > 0) {
            $this->load->view('manager_ubah_profil.html', $data);
        } else {
            redirect('login');
        }
    }

}
