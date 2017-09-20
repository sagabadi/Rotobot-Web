<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('Mlogin');
        $this->load->model('MProfilSiswa');
    }

    public function index() {
        $data['title'] = "This is Login";
        $this->load->view('login', $data);
    }

    function cekLogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->Mlogin->getlogin($username, $password);
    }

    function logout() {
        $this->load->model('Mlogin');
        $this->session->sess_destroy();
        redirect("Login");
    }

}
