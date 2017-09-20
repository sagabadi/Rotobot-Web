<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrukturAbsenInput extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function add($id) {
        date_default_timezone_set("Asia/Jakarta");
        $jam = date('H:i');
        $day = date('Y-m-d');
        $daylist = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        
        $idins = $this->session->userdata('ids');
        $cek1 = $this->db->query("Select * from detailsiswa order by (id_siswa)");
        $cek2 = $this->db->query("Select rekomendasikelas as level from detailsiswa where id_siswa = $id")->row();
        $cek3 = $cek2->level;
        $honor1 = $this->db->query("Select detail as level from level where kelas like '$cek3'")->row();
        $honor2 = $honor1->level;
        $id3 = $this->db->query("Select id_honor as level from honor where level like '$honor2'")->row();
        $idh = $id3->level;
        //foreach ($cek1->result() as $key) {
            $absen3 = $this->db->query("Select * from absensiswa")->num_rows();
            if ($absen3 == 0) {
                $absen = 1;
            } else {
                $absen2 = $this->db->query("Select max(id_absen)+1 as max from absensiswa")->row();
                $absen = $absen2->max;
            }
            //$ket = $this->input->post('data' . $key->id_siswa);
            $this->db->query("insert into absensiswa values($absen,'$jam','','$day',$id,'',$idh,0)");
        //}
        redirect('HomeInstruktur');
    }

}
