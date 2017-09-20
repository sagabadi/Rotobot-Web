<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerTambahKaryawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert() {
        $config['upload_path'] = './asset/images/Karyawan/';

        $config['allowed_types'] = 'jpg|png|jpeg';

        $config['max_size'] = '2048';

        $config['file_name'] = time();
        $username = $this->input->post('username');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tanggallahir');
        $alamat = $this->input->post('alamat');
        $hp = $this->input->post('hp');
        $jk = $this->input->post('jeniskelamin');
        $jabatan = $this->input->post('jabatan');
        $email = $this->input->post('email');
        $pass1 = $this->input->post('password');
        $nam = $this->session->userdata('nama');
        $nama = $this->input->post('nama');
        $this->load->library('upload', $config);
        $query = $this->db->query("Select * from karyawan")->num_rows();
        if ($query == 0) {
            $id = 2011;
        } else {
            $id1 = $this->db->query("Select max(id_karyawan)+1 as max from karyawan")->row();
            $id = $id1->max;
        }
        $ada = $this->db->query("Select * from karyawan where username = '$username'")->num_rows();
        $name = $this->upload->data();
        $file = $name['file_name'];
        $pisah = explode('/', $tanggal);
        $array = array($pisah[2], $pisah[0], $pisah[1]);
        $satukan = implode('-', $array);
        if ($ada == 0){
            if ($nama != '' && $username != '' && $tempat != '' && $tanggal != '' && $alamat != '' && $hp != '' && $jabatan != '' && $jk != '' && $pass1 != '' && $this->upload->do_upload('foto')) {
                $this->load->library('upload', $config);
                $this->db->query("insert into karyawan values ($id,'$nama','$username','$pass1','$tempat','$satukan','$jk','$alamat','$hp','$file','$email','$jabatan')");
                echo '<script>alert("Data Berhasil Ditambah");</script>';
                redirect('ManagerDataKaryawan','refresh');
            } else if ($nama != '' && $username != '' && $tempat != '' && $tanggal != '' && $alamat != '' && $hp != '' && $jabatan != '' && $jk != '' && $pass1 != '') {
                $this->db->query("insert into karyawan values ($id,'$nama','$username','$pass1','$tempat','$satukan','$jk','$alamat','$hp','','$email','$jabatan')");
                echo '<script>alert("Data Berhasil Ditambah");</script>';
                redirect('ManagerDataKaryawan','refresh');
            } else {
                echo '<script>alert("Isi Data Dengan Benar!!");</script>';
                redirect('ManagerDataKaryawan','refresh');
            }
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('ManagerDataKaryawan','refresh');
        }
    }

}
