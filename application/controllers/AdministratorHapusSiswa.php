<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorHapusSiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function delete($id) {
        $this->db->where('id_siswa', $id);
        $this->db->delete('siswa');
        redirect("AdministratorDataSiswa");
    }

//    public function showInstruktur($id) {
//        $instruktur = $this->db->query("Select *from instruktur where id_instruktur='$id'");
//        $data['instruktur1'] = $instruktur;
//        redirect('AdminDataInstrukturDetail',$data);
//    }
}
