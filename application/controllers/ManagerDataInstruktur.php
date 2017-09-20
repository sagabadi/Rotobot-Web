<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerDataInstruktur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        $nama = $this->session->userdata('username');
        $nama1 = $this->session->userdata('nama');
        $name = $this->db->query("Select username from karyawan where nama = '$nama1'")->num_rows();
        $instruktur = $this->db->query("Select *from karyawan where jabatan like 'Instruktur%'");
        $this->data['view'] = $instruktur;
        if ($name > 0) {
            $this->load->view('manager_data_instruktur.html', $this->data,FALSE);
        } else {
            redirect('login');
        }
    }

    public function detail() {
        $id   = $_POST['stu_id'];
        $ins = $this->db->query("Select *from karyawan where jabatan = 'Instruktur' and id_karyawan=$id");
        $this->data['instruktur'] = $ins;
        $this->load->view("modal_detail_instruktur", $this->data,FALSE);
    }

//    public function showInstruktur($id) {
//        $instruktur = $this->db->query("Select *from instruktur where id_instruktur='$id'");
//        $data['instruktur1'] = $instruktur;
//        redirect('AdminDataInstrukturDetail',$data);
//    }
}
