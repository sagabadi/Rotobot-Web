<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorUbahMateri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function Update($id) {
        $config['upload_path'] = './asset/materi/';

        $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|rar|pptx|xlsx';

        $config['max_size'] = '2048';

        $config['file_name'] = time();
        $level = $this->input->post('level');
        $pertemuan = $this->input->post('pertemuan');
        $this->load->library('upload', $config);
        if ($level != '' && $pertemuan != 0) {
            $this->db->query("Update materi set pertemuanke= $pertemuan,level = '$level' where id_materi = $id");
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('AdministratorRencanaPembelajaran','refresh');            
        } else if ($level != '' && $pertemuan != 0 && $this->upload->do_upload('file')) {
            $this->load->library('upload', $config);
            $name = $this->upload->data();
            $file = $name['file_name'];
            $this->db->query("Update materi set file = '$file', pertemuanke= $pertemuan,level = '$level' where id_materi = $id");
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('AdministratorRencanaPembelajaran','refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('AdministratorRencanaPembelajaran','refresh');
        }
    }

}
