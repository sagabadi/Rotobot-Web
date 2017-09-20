<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index()
    {
       $id = $this->session->userdata('ids');
       $this->load->library('ciqrcode');

       header("Content-Type: image/png");

       $qr['data'] = 'http://localhost/CobaRotobotBaru/InstrukturInputAbsen/show/'.$id;

       $this->ciqrcode->generate($qr);

   }

}
