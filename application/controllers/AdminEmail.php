<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEmail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $email = $this->db->query("Select * from email");
        $data['email'] = $email;
        $this->load->view('admin_lihat_email.html',$data);
    }

}
