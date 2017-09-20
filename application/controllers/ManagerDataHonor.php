<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerDataHonor extends CI_Controller {

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
        $siswa = $this->db->query("Select *from siswa");
        $honor = $this->db->query("Select * from honor");
        $data['siswa'] = $siswa;
        if ($name > 0) {
            $data['honor'] = $honor;
            $this->load->view('manager_data_honor.html', $data);
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
