<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrukturInputAbsen extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function show($id) {
        $idk = $this->session->userdata('ids');
        date_default_timezone_set("Asia/Jakarta");
        $time = date('H:i');
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
        $pertemuan =$this->db->query("Select * from absensiswa where id_siswa = $id")->num_rows();
        $cek = $this->db->query("Select rekomendasikelas from detailsiswa where id_siswa = $id")->num_rows();
        $cek1 = $this->db->query("Select rekomendasikelas from detailsiswa where id_siswa = $id");
        $cek2 = $this->db->query("Select rekomendasikelas as level from detailsiswa where id_siswa = $id")->row();
        $cek3 = $cek2->level;
        $siswa = $this->db->query("Select * from jadwal join siswa using(id_siswa) where hari = '$daylist[$day]' ");
        $idl = $this->db->query("Select id_level as max from level where kelas = '$cek3'")->row();
        $idlevel = $idl->max;
        $jika = $this->db->query("Select cast(jam as int) from jadwal where id_siswa = $id and hari = '$daylist[$day]' and jam < '$time' ")->num_rows();
        $honor = $this->db->query("Select detail as level from level where kelas like '$cek3'")->num_rows();
        $honor1 = $this->db->query("Select detail as level from level where kelas like '$cek3'")->row();
        $honor2 = $honor1->level;
        $id3 = $this->db->query("Select id_honor as level from honor where level like '$honor2'")->row();
        $idh = $id3->level;
        $abse = $this->db->query("Select * from absensiswa where id_siswa = $id")->num_rows();        
        $absen3 = $this->db->query("Select * from absensiswa")->num_rows();
        $jadwal = $this->db->query("Select * from absensiswa where id_siswa = $id")->num_rows();
        if ($jadwal > 0) {
            $max1 = $this->db->query("Select max(id_absen) as max from absensiswa where id_siswa = $id")->row();
            $max2 = $max1->max;
            $cekabsen = $this->db->query("Select * from absensiswa where id_siswa = $id and id_absen = $max2 and jampulang = '00:00:00'")->num_rows();
        }
        $hadir = $this->db->query("Select * from absensiswacek where tanggalabsen = '$now'")->num_rows();
        if ($hadir == 0) {
            foreach($siswa->result() as $key) {
                $this->db->query("insert into absensiswacek values($key->id_siswa,'$now',0,0,'Tidak Naik Level')");
            }
        }
        if ($jika > 0) {
            if ($cekabsen != 0) {
                $this->db->query("Update absensiswa set jampulang = '$time' where id_absen = $max2");
                echo '<script>alert("Anda Telah Melakukan Absen Pulang");</script>';
                redirect('InstrukturAbsenView/show/'.$id,'refresh');
            } else {
                if ($absen3 == 0) {
                    $absen = 1;
                } else {
                    $absen2 = $this->db->query("Select max(id_absen)+1 as max from absensiswa")->row();
                    $absen = $absen2->max;
                }
                if ($honor > 0) {
                    $this->db->query("insert into absensiswa values($absen,'$time','','$now',$id,$idk,$idh,0,$idlevel,'',$pertemuan+1)");
                    $this->db->query("delete from absensiswacek where id_siswa = $id");
                } else {
                    $this->db->query("insert into absensiswa values($absen,'$time','','$now',$id,$idk,0,0,$idlevel,'',$pertemuan+1)");
                    $this->db->query("delete from absensiswacek where id_siswa = $id");
                }
                echo '<script>alert("Anda Telah Melakukan Absen Masuk");</script>';
                redirect('InstrukturAbsenView/show/'.$id,'refresh');
            }
        } else {
            echo '<script>alert("Tidak Ada Jadwal Hari Ini!!");</script>';
            redirect('InstrukturAbsen','refresh');
        }
        
    }

}
