<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FinanceUbahPengeluaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function Update($id) {
        $nama = $this->input->post('nama');
        $merk = $this->input->post('merk');
        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $type = $this->input->post('type');
        $keterangan = $this->input->post('keterangan');
        $tanggal = $this->input->post('tanggal');
        $pisah = explode('/', $tanggal);
        $array = array($pisah[2], $pisah[0], $pisah[1]);
        $satukan = implode('-', $array);
        if ($nama != '' && $merk != '' && $type != '' && $keterangan != '' && $tanggal != '') {
            $total = $harga * $jumlah;
            $this->db->query("update pengeluaran set nama = '$nama', merk = '$merk', type = '$type', harga = $harga, jumlah = $jumlah, total = $total, tanggal = '$satukan', keterangan = '$keterangan' where id_pengeluaran = $id");
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('FinanceTransaksiDataPengeluaran','refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar !!");</script>';
            redirect('FinanceTransaksiDataPengeluaran','refresh');
        }
    }

}
