<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FinanceTambahPengeluaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert() {
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
        $query = $this->db->query("Select * from pengeluaran")->num_rows();
        if ($query == 0) {
            $id = 1;
        } else {
            $id1 = $this->db->query("Select max(id_pengeluaran)+1 as max from pengeluaran")->row();
            $id = $id1->max;
        }
        if ($nama != '' && $merk != '' && $type != '' && $keterangan != '' && $tanggal != '') {
            $total = $harga * $jumlah;
            $this->db->query("insert into pengeluaran values($id,'$nama','$merk','$type',$harga,$jumlah,$total,'$satukan','$keterangan')");
            echo '<script>alert("Data Berhasil Ditambah");</script>';
            redirect('FinanceTransaksiDataPengeluaran','refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('FinanceTransaksiDataPengeluaran','refresh');
        }
    }

}
