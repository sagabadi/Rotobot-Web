<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FinanceTransaksiSiswa extends CI_Controller {

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
        $name = $this->db->query("Select username from karyawan where id_karyawan = $id")->num_rows();
        $admin = $this->db->query("Select * from karyawan where nama = '$nama1'");
        $data['title'] = "This is Profil";
        $list = $this->db->query("Select id_siswa,nama,rekomendasikelas from pembayaran join detailsiswa using(id_siswa) join siswa using (id_siswa) group by id_siswa");
        $data['admin'] = $admin;
        $data['list'] = $list;
        if ($name > 0) {
            $this->load->view('finance_transaksi_siswa.html', $data);
        } else {
            redirect('login');
        }
    }

}
