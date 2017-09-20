<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeOwner extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $id = $this->session->userdata('ids');
        $siswa = $this->db->query("Select nama,jammasuk,jampulang,tanggalmasuk from absensiswa join siswa using(id_siswa) where tanggalmasuk = '$date'");
        $karyawan = $this->db->query("Select id_karyawan,nama,jammasuk,jampulang,tanggalmasuk from absenkaryawan join karyawan using(id_karyawan) where not jabatan like'Instruktur%' and tanggalmasuk = '$date'");
        $instruktur = $this->db->query("Select id_karyawan,nama,jammasuk,jampulang,tanggalmasuk from absenkaryawan join karyawan using(id_karyawan) where jabatan like'Instruktur%' and tanggalmasuk = '$date'");
        $name = $this->db->query("Select username from owner where nama = '$nama1'")->num_rows();
        $jadwal = $this->db->query("Select hari, jam from jadwal where id_siswa = $id");
        $data['title'] = "This is Home";
        if ($name > 0) {
            $data['jadwal'] = $jadwal;
            $data['instruktur'] = $instruktur;
            $data['karyawan'] = $karyawan;
            $data['siswa'] = $siswa;
            $this->load->view('owner_dashboard.html', $data);
        }
        else {
            redirect ('login');
        }
    }

}
