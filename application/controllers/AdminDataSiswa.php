<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDataSiswa extends CI_Controller {

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
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $siswa = $this->db->query("Select *from siswa");
        $this->db->select_max('id_siswa');
        $idmax = $this->db->get('siswa');
        $data['siswa'] = $siswa;
        $data['id'] = $idmax;
        if ($name > 0) {
            $this->load->view('admin_data_siswa.html', $data);
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
