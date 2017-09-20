<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrukturAbsenPulang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function show() {
        date_default_timezone_set("Asia/Jakarta");
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
        $id = $this->input->post('id');
        $cek = $this->db->query("Select rekomendasikelas from detailsiswa where id_siswa = $id")->num_rows();
        $cek1 = $this->db->query("Select rekomendasikelas from detailsiswa where id_siswa = $id");
        if ($cek > 0) {
            foreach ($cek1->result() as $key) {
                $query = $this->db->query("Select hari, rekomendasikelas, id_siswa,nama from jadwal join siswa using (id_siswa) join detailsiswa using(id_siswa) where rekomendasikelas = '$key->rekomendasikelas' and hari = '$daylist[$day]' order by(id_siswa)");
            }
            $data['jadwal'] = $query;
            $this->load->view('instruktur_absen_pulang.html', $data);
        } else {
            redirect('login');
        }
    }

}
