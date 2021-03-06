<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CetakHonorInstrukturSeluruh extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function cetak() {
        $bulan = $this->input->post('bulan');
        if ($bulan != 0) {
            $absen = $this->db->query("Select sum(gaji) as gaji,id_karyawan,jabatan,tanggalmasuk,id_absen,nama from absensiswa join karyawan using(id_karyawan) join honor using(id_honor) where month(tanggalmasuk) = $bulan group by id_karyawan,month(tanggalmasuk)");
        } else {
            $absen = $this->db->query("Select sum(gaji) as gaji,id_karyawan,jabatan,tanggalmasuk,id_absen,nama from absensiswa join karyawan using(id_karyawan) join honor using(id_honor) group by id_karyawan,month(tanggalmasuk)");
        }
        $data['title'] = "This is Home";
        $data['absen'] = $absen;
        $this->load->view('cetak_data_honor_instruktur_seluruh.html', $data);
    }

}
