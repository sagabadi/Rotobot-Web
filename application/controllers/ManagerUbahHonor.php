<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerUbahHonor extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function Update($id) {
        $gaji = $this->input->post('gaji');
        if ($gaji != 0) {            
            $this->db->query("update honor set gaji = $gaji where id_honor = $id");
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('ManagerDataHonor','refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('ManagerDataHonor','refresh');
        }
    }

}
