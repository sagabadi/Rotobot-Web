<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorDataHonorKaryawan extends CI_Controller {

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
        $id = $this->session->userdata('ids');
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $honor = $this->db->query("Select sum(gaji) as gaji,id_absen,id_karyawan,nama,jabatan,tanggalmasuk from absenkaryawan join karyawan using(id_karyawan) join honor using(id_honor)where not jabatan like'instruktur%' group by id_karyawan,month(tanggalmasuk)");
        if ($name > 0) {
            $data['title'] = "This is Home";
            $data['honor'] = $honor;
            $this->load->view('administrator_data_honor_karyawan.html', $data);
        } else {
            redirect('login');
        }
    }

}
