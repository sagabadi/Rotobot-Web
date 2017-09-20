<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CetakStrukPembayaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function cetak() {
        date_default_timezone_set("Asia/Jakarta");
        $username = $this->input->post('username');
        $norek = $this->input->post('norek');
        $namapengirim = $this->input->post('namapengirim');
        $bayar = $this->input->post('bayar');
        $keterangan = $this->input->post('keterangan');
        $idsi = $this->db->query("Select id_siswa as max from siswa where username = '$username'")->row();
        $ids = $idsi->max;   
        $query = $this->db->query("Select * from pembayaran")->num_rows();
        if ($query == 0) {
            $id = 1;
        } else {
            $id1 = $this->db->query("Select max(id_pembayaran)+1 as max from pembayaran")->row();
            $id = $id1->max;
        }
        $date = date('Y-m-d');
        $cek = $this->db->query("Select * from pembayaranemail where id_siswa = $ids and month(tglbayar) = month('$date')")->num_rows();
        $cekdetail = $this->db->query("Select * from detailsiswa where id_siswa = $ids")->num_rows();
        if ($cekdetail == 0) {
            echo '<script>alert("Siswa Belum Mengikuti PreTest");</script>';
            redirect('AdminTransaksiSiswa','refresh');
        }
        if ($cek > 0) {
            if ($username != ''  && $bayar != 0 && $keterangan != 0 ) {
                $this->db->query("insert into pembayaran values($id,$ids,$keterangan,'$date',$bayar)");
                $idp = $this->db->query("Select max(id_bayar) as max from pembayaranemail where id_siswa = $ids")->row();
                $idf = $idp->max;
                $tagih = $this->db->query("Select namapengirim,nama,rekomendasikelas,totalbayar,ke from pembayaranemail join detailsiswa using(id_siswa) join pembayaran using(id_siswa) join siswa using(id_siswa) where id_bayar = $idf group by id_siswa");
                $data['bayar'] = $tagih;
                $this->load->view('cetak_struk_pembayaran.html', $data);
            } else {
                echo '<script>alert("Isi Data Dengan Benar!!");</script>';
                redirect('AdminTransaksiSiswa','refresh');
            }
        } else {
            echo '<script>alert("Siswa Yang Bersangkutan Belum Melakukan Transfer Pembayaran!!");</script>';
            redirect('AdminTransaksiSiswa','refresh');
        }
        
    }

}
