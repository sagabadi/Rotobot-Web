<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTambahEmail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert() {
        $email = $this->input->post('email');
        $cek = $this->db->query("Select * from email")->num_rows();
        if ($cek == 0) {
            $id = 1;
        } else {
            $ids = $this->db->query("Select max(id_email)+1 as max from email")->row();
            $id = $ids->max;
        }
        if ($email != '') {
            $this->db->query("insert into email values($id,'$email')");   
            redirect('AdminEmail');         
        } else {
            redirect('AdminEmail');
        }

    }

}
