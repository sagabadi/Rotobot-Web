<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilAdmin extends CI_Controller {

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
        $name = $this->db->query("Select username from karyawan where username = '$nama'")->num_rows();
        $admin = $this->db->query("Select * from karyawan where nama = '$nama1'");
        $data['title'] = "This is Profil";
        $data['admin'] = $admin;
        if ($name > 0) {
            $this->load->view('admin_profil.html', $data);
        } else {
            redirect('login');
        }
    }

}
