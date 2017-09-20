<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorEditJadwal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $id = $this->session->userdata('ids');
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $name = $this->db->query("Select username from karyawan where nama  = '$nama1'")->num_rows();

        if ($name == 0) {
            redirect('login');
        }
    }

    public function show($id) {
        $honor = $this->db->query("Select * from jadwal where id_jadwal='$id'");
        $data['jadwal'] = $honor;
        $this->load->view('administrator_edit_jadwal.html', $data);
    }

}
