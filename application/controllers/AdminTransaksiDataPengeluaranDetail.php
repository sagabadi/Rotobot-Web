<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTransaksiDataPengeluaranDetail extends CI_Controller {

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
        $karyawan = $this->db->query("Select *from pengeluaran where id_pengeluaran='$id'");
        $data['barang'] = $karyawan;
        $this->load->view('admin_transaksi_data_pengeluaran_detail.html', $data);
    }

}
