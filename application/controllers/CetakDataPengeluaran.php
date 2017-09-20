<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CetakDataPengeluaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function cetak($id) {
        $cetak = $this->db->query("Select * from pengeluaran where id_pengeluaran = $id");
        $data['list'] = $cetak;
        $this->load->view('cetak_data_pengeluaran.html', $data);
    }

}
