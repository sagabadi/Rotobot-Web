<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorDataHonorInstrukturDetail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $id = $this->session->userdata('ids');
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $name = $this->db->query("Select username from karyawan where nama  = '$nama1'")->num_rows();

        if ($name == 0) {
            redirect('login');
        }
    }

    public function show($id) {
        $bulan = $this->db->query("Select id_karyawan,month(tanggalmasuk) as bulan from absensiswa where id_absen = $id");
//        $honor = $this->db->query("Select nama,id_karyawan,gaji as gaji,rekomendasikelas as level, tanggalmasuk from absensiswa join karyawan using(id_karyawan) join honor using(id_honor) join detailsiswa using(id_siswa) where id_karyawan = $id  group by id_karyawan,tanggalmasuk,jampulang");
//        $absen = $this->db->query("Select * from karyawan where id_karyawan = $id");
        foreach ($bulan->result() as $key) {
            $honor = $this->db->query("Select nama,jabatan,id_absen,id_karyawan,sum(gaji) as gaji,rekomendasikelas as level,tanggalmasuk from absensiswa join karyawan using(id_karyawan) join honor using(id_honor) join detailsiswa using(id_siswa) where id_karyawan = $key->id_karyawan and month(tanggalmasuk) = '$key->bulan' group by id_karyawan,month(tanggalmasuk)");
            $absen = $this->db->query("Select id_karyawan,tanggalmasuk,gaji,kelas as level from absensiswa join honor using(id_honor) join level using(id_level) where id_karyawan = $key->id_karyawan and month(tanggalmasuk) = '$key->bulan'");
        }
        $data['honor'] = $honor;
        $data['absen'] = $absen;
        $this->load->view('administrator_data_honor_instruktur_detail.html', $data);
    }

}
