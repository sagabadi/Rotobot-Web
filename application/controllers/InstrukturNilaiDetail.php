<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrukturNilaiDetail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function show($id) {
        $nilai = $this->db->query("Select id_siswa,kelas,nilai,naik from absensiswa join level using(id_level) where id_siswa = $id");
        $siswa = $this->db->query("Select * from siswa where id_siswa = $id");
        $data['nilai'] = $nilai;
        $data['siswa'] = $siswa;
        $this->load->view('instruktur_nilai_siswa_detail.html',$data);
    }

}
