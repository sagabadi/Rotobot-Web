<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerDataHonorDetail extends CI_Controller {

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
        $instruktur = $this->db->query("Select *from honor where id_honor='$id'");
        $data['honor'] = $instruktur;
        $this->load->view('manager_data_honor_detail.html', $data);
    }

}
