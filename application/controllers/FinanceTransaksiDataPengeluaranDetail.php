<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FinanceTransaksiDataPengeluaranDetail extends CI_Controller {

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
        $name = $this->db->query("Select username from karyawan where id_karyawan= $id")->num_rows();
        $pengeluaran = $this->db->query("Select * from pengeluaran");
        $data['title'] = "This is Profil";
        $data['pengeluaran'] = $pengeluaran;
        if ($name > 0) {
            $this->load->view('finance_transaksi_data_pengeluaran.html', $data);
        } else {
            redirect('login');
        }
    }

    public function show($id) {
        $karyawan = $this->db->query("Select *from pengeluaran where id_pengeluaran='$id'");
        $data['barang'] = $karyawan;
        $this->load->view('finance_transaksi_data_pengeluaran_detail.html', $data);
    }

}
