<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CetakHonorKaryawanSeluruh extends CI_Controller {

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
            $absen = $this->db->query("Select sum(gaji) as gaji,id_absen,id_karyawan,nama,jabatan,tanggalmasuk from absenkaryawan join karyawan using(id_karyawan) join honor using(id_honor)where not jabatan like'instruktur%' and month(tanggalmasuk) = $bulan group by id_karyawan,month(tanggalmasuk)");
        } else {
            $absen = $this->db->query("Select sum(gaji) as gaji,id_absen,id_karyawan,nama,jabatan,tanggalmasuk from absenkaryawan join karyawan using(id_karyawan) join honor using(id_honor)where not jabatan like'instruktur%' group by id_karyawan,month(tanggalmasuk)");
        }
        $data['title'] = "This is Home";
        $data['absen'] = $absen;
        $this->load->view('cetak_data_honor_karyawan_seluruh.html', $data);
    }

}
