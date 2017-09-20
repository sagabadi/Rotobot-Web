<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPembelajaranInstruktur extends CI_Controller {
	
	function  __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database(); // load database
		$this->load->library('pagination');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$data['title'] = "This is Home";
		$this->load->view('instruktur_data_pembelajaran.html',$data);
	}
	
}
