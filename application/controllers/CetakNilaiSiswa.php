<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CetakNilaiSiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function cetak($id) {
        $nilai = $this->db->query("Select nilai,kelas,naik from absensiswa join level using(id_level) where id_siswa='$id'");
        $siswa = $this->db->query("Select * from siswa where id_siswa = $id");
        $data['nilai'] = $nilai;
        $data['siswa'] = $siswa;
        $this->load->view('cetak_nilai_siswa.html', $data);
    }

}
