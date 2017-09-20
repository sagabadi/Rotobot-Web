<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerDataHonorKaryawanDetail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $name = $this->db->query("Select username from admin where username = '$nama'")->num_rows();

        if ($name == 0) {
            redirect('login');
        }
    }

    public function show($id) {
        $bulan = $this->db->query("Select id_karyawan,month(tanggalmasuk) as bulan from absenkaryawan where id_absen = $id");
        foreach ($bulan->result() as $key) {
            $honor = $this->db->query("Select id_karyawan,sum(gaji) as gaji,id_absen,nama,jabatan from absenkaryawan join karyawan using(id_karyawan) join honor using(id_honor)where not jabatan like'instruktur%' and id_karyawan = $key->id_karyawan and month(tanggalmasuk) = '$key->bulan' group by id_karyawan,month(tanggalmasuk)");
            $absen = $this->db->query("Select tanggalmasuk,gaji from absenkaryawan join honor using(id_honor) where id_karyawan = $key->id_karyawan and month(tanggalmasuk) = '$key->bulan'");
        }
        $data['honor'] = $honor;
        $data['absen'] = $absen;
        $this->load->view('manager_data_honor_karyawan_detail.html', $data);
    }

}
