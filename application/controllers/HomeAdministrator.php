<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdministrator extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        date_default_timezone_set("Asia/Jakarta");
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $id = $this->session->userdata('ids');
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $date = date("Y-m-d");
        $siswa = $this->db->query("Select nama,jammasuk,jampulang,tanggalmasuk from absensiswa join siswa using(id_siswa) where tanggalmasuk = '$date'");
        $karyawan = $this->db->query("Select id_karyawan,nama,jammasuk,jampulang,tanggalmasuk from absenkaryawan join karyawan using(id_karyawan) where not jabatan like'Instruktur%' and tanggalmasuk = '$date'");
        $instruktur = $this->db->query("Select id_karyawan,nama,jammasuk,jampulang,tanggalmasuk from absenkaryawan join karyawan using(id_karyawan) where jabatan like'Instruktur%' and tanggalmasuk = '$date'");
        if ($name > 0) {
            $data['title'] = "This is Home";
            $data['karyawan'] = $karyawan;
            $data['instruktur'] = $instruktur;
            $data['siswa'] = $siswa;
            $this->load->view('administrator_dashboard.html', $data);
        } else {
            redirect ('login');
        }
    }

}
