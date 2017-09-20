<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrukturAbsenSiswa extends CI_Controller {

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
        $query = $this->db->query("Select * from siswa");
        if ($name > 0) {
            $data['siswa'] = $query;
            $this->load->view('instruktur_absen_siswa.html', $data);
        } else {
            redirect('login');
        }
    }

    public function getsiswa() {
        $keyword = $this->uri->segment(3);

        // cari di database
        $data = $this->db->query("Select * from siswa where id_siswa = $keyword");

        // format keluaran di dalam array
        foreach ($data->result() as $row) {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value' => $row->id_siswa,
                'nama' => $row->nama,
                'gol' => $row->username,
                'unit_kerja' => $row->jeniskelamin
            );
        }
        // minimal PHP 5.2
        echo json_encode($arr);
        $kode = $this->input->post('kode'); //variabel kunci yang di bawa dari input text id kode
        $query = $this->db->query("Select * from siswa where id_siswa = $kode"); //query model
        $data['siswa'] = $query;
        $this->load->view('instruktur_absen_siswa.html', $data);
    }

}
