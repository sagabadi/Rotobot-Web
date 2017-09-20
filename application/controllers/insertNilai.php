<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class insertNilai extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert($id) {
            $nilai = $this->input->post('nilai');
            $keterangan = $this->input->post('keterangan');
            $level = $this->input->post('level');
            $this->db->query("Update absensiswa set nilai = $nilai, naik = '$keterangan' where id_absen = $id");
            $id1 = $this->db->query("Select id_siswa as max from absensiswa where id_absen = $id")->row();
            $ids = $id1->max;
            $this->db->query("Update detailsiswa set rekomendasikelas = '$level' where id_siswa = $ids ");
            redirect('InstrukturAbsenView/show/'.$ids);        
    }

}
