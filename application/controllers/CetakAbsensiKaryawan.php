<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CetakAbsensiKaryawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $bulan = $this->input->post('bulan');
        if ($bulan != 0) {
            $karyawan = $this->db->query("Select nama,jabatan,tanggalmasuk,jammasuk,jampulang from absenkaryawan join karyawan using(id_karyawan) where not jabatan like 'Instruktur%' and month(tanggalmasuk) = $bulan");
        } else {
            $karyawan = $this->db->query("Select nama,jabatan,tanggalmasuk,jammasuk,jampulang from absenkaryawan join karyawan using(id_karyawan) where not jabatan like 'Instruktur%'");
        }
        $data['karyawan'] = $karyawan;
        $this->load->view('cetak_data_absensi_karyawan.html', $data);
    }

}
