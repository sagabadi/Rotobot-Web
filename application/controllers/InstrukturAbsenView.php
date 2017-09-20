<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrukturAbsenView extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function show($id) {
        date_default_timezone_set("Asia/Jakarta");
        $jam = date('H:i');
        $now = date('Y-m-d');
        $day = date('D');
        $daylist = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
            );
        $cek = $this->db->query("Select rekomendasikelas from detailsiswa where id_siswa = $id")->num_rows();
        $cek1 = $this->db->query("Select rekomendasikelas from detailsiswa where id_siswa = $id");
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $id = $this->session->userdata('ids');
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $query = $this->db->query("Select * from siswa");
        if ($cek > 0) {
            foreach ($cek1->result() as $key) {                
                $query = $this->db->query("Select id_absen,hari,jammasuk,jampulang, rekomendasikelas, id_siswa,nama from jadwal join siswa using (id_siswa) join detailsiswa using(id_siswa) join absensiswa using(id_siswa) where rekomendasikelas = '$key->rekomendasikelas' and hari = '$daylist[$day]' order by(id_siswa) "); 
                $siswa = $this->db->query("Select * from jadwal join siswa using (id_siswa) join detailsiswa using(id_siswa) where rekomendasikelas = '$key->rekomendasikelas' and hari = '$daylist[$day]' group by(jam) order by(id_siswa)");               
            }
        } 
        $kelas = $this->db->query("Select * from level");
        $data['kelas'] = $kelas;
        $data['siswa'] = $siswa;
        $data['jadwal'] = $query;
        $data['id'] = $id;
        $data['level'] = $cek1;
        if ($name > 0) {
            $data['siswa'] = $query;
            $this->load->view('instruktur_absen_view.html', $data);
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
