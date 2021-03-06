<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEditKaryawan extends CI_Controller {

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
        $name = $this->db->query("Select username from admin where nama = '$nama1'")->num_rows();
        
        if ($name == 0) {
            redirect('login');
        }
    }

    public function show($id) {
        $karyawan = $this->db->query("Select *from karyawan where id_karyawan='$id'");
        $data['karyawan'] = $karyawan;
        $this->load->view('admin_edit_karyawan.html', $data);
    }

    public function showemail($id) {
        $karyawan = $this->db->query("Select *from email where id_email=$id");
        $data['email'] = $karyawan;
        $this->load->view('admin_edit_email.html', $data);
    }

}
