<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUbahJadwal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function Update($id) {
        $id1 = $this->db->query("Select id_siswa as max from jadwal where id_jadwal = $id")->row();
        $ids = $id1->max;
        $hari = $this->input->post('hari');
        $jam = $this->input->post('jam');
        if ($hari != '' && $jam != '') {
            $this->db->query("Update jadwal set hari = '$hari', jam = '$jam' where id_jadwal = $id");
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect("AdminTambahJadwal/show/" . $ids,'refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar !!");</script>';
            redirect("AdminTambahJadwal/show/" . $ids,'refresh');
        }
    }

}
