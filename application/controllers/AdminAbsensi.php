<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAbsensi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function Absen() {
        $username = $this->input->post('username');
        $jabatan = $this->input->post('jabatan');
        $absen1 = $this->db->query("Select * from karyawan where username = '$username' and jabatan = '$jabatan'")->num_rows();
        $absen3 = $this->db->query("Select * from absenkaryawan")->num_rows();
        if ($absen3 == 0) {
            $absen = 1;
        } else {
            $absen2 = $this->db->query("Select max(id_absen)+1 as max from absenkaryawan")->row();
            $absen = $absen2->max;
        }
        if ($absen1 != 0) {
            $id1 = $this->db->query("Select id_karyawan as max from karyawan where username = '$username' and jabatan = '$jabatan'")->row();
            $id = $id1->max;
            $honor1 = $this->db->query("Select id_honor as max from honor where level like'$jabatan'")->num_rows();
            $honor = $this->db->query("Select id_honor as max from honor where level like'$jabatan'")->row();
            $gaji = $honor->max;
            $max2 = $this->db->query("Select id_absen as max from absenkaryawan where id_karyawan = $id")->num_rows();
            $day = date('Y-m-d');
            date_default_timezone_set("Asia/Jakarta");
            $now = date('H:i');
            if ($max2 != 0) {
                $max1 = $this->db->query("Select max(id_absen) as max from absenkaryawan where id_karyawan = $id")->row();
                $max = $max1->max;
                $query2 = $this->db->query("select * from absenkaryawan where id_karyawan=$id and id_absen=$max and jampulang='00:00:00'")->num_rows();
                if ($query2 != 0) {
                    $this->db->query("Update absenkaryawan set jampulang = '$now' where id_karyawan = $id and id_absen = $max");
                } else {
                    if ($honor1 != 0) {
                        $this->db->query("Insert into absenkaryawan values($absen,'$now','','$day',$id,$gaji)");
                    } else {
                        $this->db->query("Insert into absenkaryawan values($absen,'$now','','$day',$id,0)");
                    }
                }
                echo '<script>alert("Absen Berhasil");</script>';
                redirect('AdminPortalAbsensi','refresh');
            } else {
                if ($honor1 != 0) {
                    $this->db->query("Insert into absenkaryawan values($absen,'$now','','$day',$id,$gaji)");
                } else {
                    $this->db->query("Insert into absenkaryawan values($absen,'$now','','$day',$id,0)");
                }
                echo '<script>alert("Absen Berhasil");</script>';
                redirect('AdminPortalAbsensi','refresh');
            }
        } else {
            echo '<script>alert("Terjadi Kegagalan, Coba Sekali Lagi!!");</script>';
            redirect('AdminPortalAbsensi','refresh');
        }
    }

}
