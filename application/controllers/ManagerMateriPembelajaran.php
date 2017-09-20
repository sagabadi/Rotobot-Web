<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerMateriPembelajaran extends CI_Controller {

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
        $name = $this->db->query("Select username from karyawan where username = '$nama'")->num_rows();
        $materi = $this->db->query("Select *from materi");
        $level = $this->db->query("Select * from level");
        $data['materi'] = $materi;
        $data['level'] = $level;
        if ($name > 0) {
            $this->load->view('manager_materi_pembelajaran.html', $data);
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
