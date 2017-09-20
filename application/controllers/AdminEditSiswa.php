<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEditSiswa extends CI_Controller {

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
        $karyawan = $this->db->query("Select *from siswa where id_siswa='$id'");
        $jadwal = $this->db->query("Select * from level");
        $detail = $this->db->query("Select * from detailsiswa where id_siswa = $id");
        $cek = $this->db->query("Select * from detailsiswa where id_siswa = $id")->num_rows();
        $hari = $this->db->query("Select * from jadwal where id_siswa = $id");
        $data['siswa'] = $karyawan;
        $data['level'] = $jadwal;        
        $data['jadwal'] = $hari;
        $data['detail'] = $detail;

        $datas['siswa'] = $karyawan;
        $datas['level'] = $jadwal;        
        $datas['jadwal'] = $hari;
        $datas['detail'] = $detail;
        if ($cek  > 0) {            
            $this->load->view('admin_edit_siswa.html', $datas);
        } else {            
            $this->load->view('admin_edit_siswa_kosong.html', $data);
        }
    }

}
