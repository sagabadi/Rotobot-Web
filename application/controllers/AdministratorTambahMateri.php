<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorTambahMateri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert() {
        $config['upload_path'] = './asset/materi/';

        $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|rar|pptx|xlsx';

        $config['max_size'] = '2048';

        $config['file_name'] = time();
        $level = $this->input->post('level');
        $pertemuan = $this->input->post('pertemuan');
        $this->load->library('upload', $config);
        if ( $level !='' && $pertemuan!= 0 && $this->upload->do_upload('file')) {
            $this->load->library('upload', $config);

            $query = $this->db->query("Select * from materi")->num_rows();
            if ($query == 0) {
                $id = 1;
            } else {
                $id1 = $this->db->query("Select max(id_materi)+1 as max from materi")->row();
                $id = $id1->max;
            }
            $name = $this->upload->data();
            $file = $name['file_name'];
            $this->db->query("insert into materi values ($id,'$file',$pertemuan,'$level')");
            echo '<script>alert("Data Berhasil Ditambah");</script>';
            redirect('AdministratorRencanaPembelajaran','refresh');
        }else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('AdministratorRencanaPembelajaran','refresh');    
        }
    }

}
