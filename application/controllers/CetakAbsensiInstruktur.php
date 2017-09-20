<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CetakAbsensiInstruktur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $instruktur = $this->db->query("Select nama,jabatan,tanggalmasuk,jammasuk,jampulang from absenkaryawan join karyawan using(id_karyawan) where jabatan ='Instruktur Tetap' or jabatan ='Instruktur Freelance'");
        $data['instruktur'] = $instruktur;
        $this->load->view('cetak_data_absensi_instruktur.html', $data);
    }

}
