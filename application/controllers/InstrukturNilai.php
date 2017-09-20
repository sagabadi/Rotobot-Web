<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrukturNilai extends CI_Controller {

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
        $data['title'] = "This is Profil";
        $siswa = $this->db->query("Select id_siswa,nama,level from absensiswa join level using(id_level) join siswa using(id_siswa) GROUP by id_siswa");
        $data['siswa'] = $siswa;

        if ($name > 0) {
            $this->load->view('instruktur_nilai_siswa.html', $data);
        } else {
            redirect('login');
        }
    }

}
