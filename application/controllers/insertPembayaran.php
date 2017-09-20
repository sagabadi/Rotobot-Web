<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class insertPembayaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert() {
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './asset/images/Pembayaran/';

        $config['allowed_types'] = 'jpg|png|jpeg';

        $config['max_size'] = '2048';

        $config['file_name'] = time();
        $this->load->library('upload', $config);
        $username = $this->input->post('username');
        $norek = $this->input->post('norek');
        $namapengirim = $this->input->post('namapengirim');
        $bayar = $this->input->post('bayar');
        $keterangan = $this->input->post('keterangan');
        $name = $this->upload->data();
        $idsi = $this->db->query("Select id_siswa as ma from siswa where username = '$username'")->row();
        $ids = $idsi->ma;
        $query = $this->db->query("Select * from pembayaran")->num_rows();
        $cek = $this->db->query("Select * from pembayaran where id_siswa = $ids")->num_rows();
        if ($query == 0) {
            $id = 1;
        } else {
            $id1 = $this->db->query("Select max(id_pembayaran)+1 as max from pembayaran")->row();
            $id = $id1->max;
        }
        $date = date('Y-m-d');
        $file = $name['file_name'];
        if ($username != '' && $norek != '' && $namapengirim != '' && $bayar != 0 && $keterangan != '' && $this->upload->do_upload('foto')) {
            $this->load->library('upload', $config);
            if ($cek == 0) {
                $this->db->query("insert into pembayaran values($id,$ids,'$namapengirim','$norek','$keterangan','$date',$bayar,$file)");
            } else {
                $this->db->query("update pembayaran set namapengirim = '$namapengirim', norek='$norek',keterangan='$keterangan',tglbayar='$date',totalbayar=$bayar,buktipembayaran='$file' where id_siswa = $ids");
            }
            redirect('login');
        } else {
            redirect('login');
        }
    }

}
