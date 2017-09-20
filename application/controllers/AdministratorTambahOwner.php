<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorTambahOwner extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert() {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->db->query("Select * from owner")->num_rows();
        if ($query == 0) {
            $id = 1;
        } else {
            $id1 = $this->db->query("Select max(id_owner)+1 as max from owner")->row();
            $id = $id1->max;
        }
        if ($nama != '' && $username != '' && $password != '') {
            $this->db->query("insert into owner values($id,'$nama','$username','$password')");
            echo '<script>alert("Data Berhasil Ditambah");</script>';
            redirect('AdministratorDataOwner','refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('AdministratorDataOwner','refresh');
        }
    }

}
