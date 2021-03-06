<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerDataAbsensiKaryawan extends CI_Controller {

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
        $name = $this->db->query("Select username from karyawan where username = '$nama'")->num_rows();
        $siswa = $this->db->query("Select *from siswa");
        $data['siswa'] = $siswa;
        $query = $this->db->query("Select id_karyawan,jabatan,tanggalmasuk,nama,jammasuk,jampulang from absenkaryawan join karyawan using(id_karyawan) where not jabatan like 'Instruktur%'")->result();
        $data['karyawan'] = $query;
        if ($name > 0) {
            $this->load->view('manager_data_kehadiran_karyawan.html', $data);
        } else {
            redirect('login');
        }
    }

//    public function showInstruktur($id) {
//        $instruktur = $this->db->query("Select *from instruktur where id_instruktur='$id'");
//        $data['instruktur1'] = $instruktur;
//        redirect('AdminDataInstrukturDetail',$data);
//    }

}
