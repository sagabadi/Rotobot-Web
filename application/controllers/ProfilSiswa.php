<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilSiswa extends CI_Controller {
	
	function  __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database(); // load database
		$this->load->library('pagination');
		$this->load->helper('url');
                $this->load->model('MProfilSiswa');
	}
	
	public function Nama()
	{
		$this->MProfilSiswa->GetNama();
	}
        
        public function Alamat()
	{
		$this->MProfilSiswa->GetAlamat();
	}
        
        public function Email()
	{
		$this->MProfilSiswa->GetEmail();
	}
	
}
