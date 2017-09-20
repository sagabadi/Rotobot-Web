<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorDataSiswaDetail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function show($id) {
        $siswa = $this->db->query("Select *from siswa where id_siswa='$id'");
        $detail = $this->db->query("Select * from detailsiswa where id_siswa = $id");
        $jadwal = $this->db->query("Select * from jadwal where id_siswa = $id");
        $data['siswa'] = $siswa;
        $data['detail'] = $detail;
        $data['jadwal'] = $jadwal;
        $this->load->view('administrator_data_siswa_detail.html', $data);
    }

}
