<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerTambahJadwal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function show($ids) {
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $id = $this->session->userdata('ids');
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $jadwal = $this->db->query("Select * from jadwal where id_siswa = $ids");
        $siswa = $this->db->query("Select * from siswa where id_siswa = $ids");
        if ($name > 0) {
            $data['title'] = "This is Home";
            $data['jadwal'] = $jadwal;
            $data['siswa'] = $siswa;
            $this->load->view('manager_tambah_jadwal.html', $data);
        } else {
            redirect('login');
        }
    }

}
