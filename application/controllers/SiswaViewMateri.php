<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaViewMateri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        date_default_timezone_set("Asia/Jakarta");
        $now = date('Y-m-d');
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $id = $this->session->userdata('ids');
        $name = $this->db->query("Select username from siswa where nama = '$nama1'")->num_rows();
        $cek = $this->db->query("Select * from absensiswa where id_siswa = $id and tanggalmasuk = '$now'")->num_rows();
        if ($cek > 0) {
            $level1 = $this->db->query("Select kelas as max from absensiswa join level using(id_level) where id_siswa = $id")->row();
            $level = $level1->max;
        } else {
            echo '<script>alert("Anda Belum Melakukan Absensi!!");</script>';
            redirect('Home','refresh');
        }
        $pertemuan = $this->db->query("Select * from absensiswa where id_siswa = $id")->num_rows();
        $materi = $this->db->query("Select * from materi where level = '$level' and pertemuanke = $pertemuan");
        $data['title'] = "This is Profil";
        if ($name > 0) {
            $data['materi'] = $materi;
            $this->load->view('siswa_view_materi.html', $data);
        } else {
            redirect('login');
        }
    }

}
