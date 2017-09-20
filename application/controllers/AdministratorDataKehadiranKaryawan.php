<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorDataKehadiranKaryawan extends CI_Controller {

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
        $query = $this->db->query("Select id_karyawan,jabatan,tanggalmasuk,nama,jammasuk,jampulang from absenkaryawan join karyawan using(id_karyawan) where not jabatan like 'Instruktur%'")->result();
        $data['karyawan'] = $query;
        if ($name > 0) {
            $data['title'] = "This is Home";
            $this->load->view('administrator_data_kehadiran_karyawan.html', $data);
        } else {
            redirect ('login');
        }
    }

}
