<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerDataInstruktur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('DetailInstruktur');
    }
    public function detail($id) {
        $ins = $this->db->query("Select *from karyawan where jabatan = 'Instruktur' and id_karyawan=$id");
        $dat['ins'] = $ins;
        $this->load->view('modal_detail_instruktur', $dat);
    }

//    public function showInstruktur($id) {
//        $instruktur = $this->db->query("Select *from instruktur where id_instruktur='$id'");
//        $data['instruktur1'] = $instruktur;
//        redirect('AdminDataInstrukturDetail',$data);
//    }
}
