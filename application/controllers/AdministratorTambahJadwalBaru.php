<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorTambahJadwalBaru extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function add($id) {
        $hari = $this->input->post('hari');
        $jam = $this->input->post('jam');
        $daftar = $this->db->query("Select * from jadwal")->num_rows();
        if ($daftar == 0) {
            $id2 = 1;
        } else {
            $id1 = $this->db->query("Select max(id_jadwal)+1 as max from jadwal")->row();
            $id2 = $id1->max;
        }
        if ($jam != '') {
            $this->db->query("insert into jadwal values($id2,'$hari','$jam',$id)");
            echo '<script>alert("Data Berhasil Ditambah");</script>';
            redirect('AdministratorTambahJadwal/show/'.$id,'refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('AdministratorTambahJadwal/show/'.$id,'refresh');
        }
    }

}
