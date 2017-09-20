<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDataInstruktur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $nama = $this->session->userdata('username');
        $id = $this->session->userdata('ids');
        $nama1 = $this->session->userdata('nama');
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $instruktur = $this->db->query("Select *from karyawan where jabatan = 'Instruktur Tetap' or jabatan = 'Instruktur Freelance' ");
        $data['instruktur'] = $instruktur;
        if ($name > 0) {
            $this->load->view('admin_data_instruktur.html', $data);
        } else {
            redirect('login');
        }
    }

//    public function showInstruktur($id) {
//        $instruktur = $this->db->query("Select *from instruktur where id_instruktur='$id'");
//        $data['instruktur1'] = $instruktur;
//        redirect('AdminDataInstrukturDetail',$data);
//    }

}
