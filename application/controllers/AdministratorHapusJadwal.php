<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorHapusJadwal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function delete($id) {
        $id1 = $this->db->query("Select id_siswa as max from jadwal where id_jadwal = $id")->row();
        $ids = $id1->max;
        $this->db->where('id_jadwal', $id);
        $this->db->delete('jadwal');
        redirect("AdministratorTambahJadwal/show/".$ids);
    }

//    public function showInstruktur($id) {
//        $instruktur = $this->db->query("Select *from instruktur where id_instruktur='$id'");
//        $data['instruktur1'] = $instruktur;
//        redirect('AdminDataInstrukturDetail',$data);
//    }
}
