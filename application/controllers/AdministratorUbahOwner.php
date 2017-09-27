<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorUbahOwner extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function Update($id) {
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        if ($username != '' && $nama != ''&& $password != '') {
            $this->db->query("Update owner set username= '$username',nama = '$nama',password = '$password' where id_owner = $id");
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('AdministratorDataOwner','refresh');            
        }  else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('AdministratorDataOwner','refresh');
        }
    }

}
