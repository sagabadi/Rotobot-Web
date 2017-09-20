<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaReport extends CI_Controller {

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
        $name = $this->db->query("Select username from siswa where username= '$nama'")->num_rows();
        $data['title'] = "This is Profil";
        $nilai = $this->db->query("Select nilai,naik,kelas from absensiswa join level using(id_level) where id_siswa = $id");
        if ($name > 0) {
            $data['nilai'] = $nilai;
            $this->load->view('siswa_report.html', $data);
        } else {
            redirect('login');
        }
    }

}
