<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerDataHonorInstruktur extends CI_Controller {

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
        $absen = $this->db->query("Select sum(gaji) as gaji,id_karyawan,tanggalmasuk,id_absen,nama from absensiswa join karyawan using(id_karyawan) join honor using(id_honor) group by id_karyawan,month(tanggalmasuk)");
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        if ($name > 0) {
            $data['title'] = "This is Home";
            $data['absen'] = $absen;
            $this->load->view('manager_data_honor_instruktur.html', $data);
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
