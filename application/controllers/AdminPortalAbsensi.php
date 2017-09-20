<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPortalAbsensi extends CI_Controller {

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
        $siswa = $this->db->query("Select *from siswa");
        $date = date("Y-m-d");
        $query = $this->db->query("Select nama,jammasuk,jampulang from absenkaryawan join karyawan using(id_karyawan) where tanggalmasuk = '$date'")->result();
        $this->db->select_max('id_siswa');
        $idmax = $this->db->get('siswa');
        $data['siswa'] = $siswa;
        $data['id'] = $idmax;
        $data['karyawan'] = $query;
        if ($name > 0) {
            $this->load->view('admin_portal_absensi.html', $data);
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
