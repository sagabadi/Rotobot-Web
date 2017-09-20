<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerUbahKaryawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function Update($id) {
        $config['upload_path'] = './asset/images/Karyawan/';

        $config['allowed_types'] = 'jpg|png|jpeg';

        $config['max_size'] = '2048';

        $config['file_name'] = time();
        $nama = $this->input->post('nama');
        //$id = $this->input->post('id');
        $query = $this->db->query("Select * from karyawan")->num_rows();
        $username = $this->input->post('username');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tanggallahir');
        $alamat = $this->input->post('alamat');
        $hp = $this->input->post('hp');
        $jabatan = $this->input->post('jabatan');
        $jk = $this->input->post('jeniskelamin');
        $email = $this->input->post('email');
        $pass1 = $this->input->post('password');
        $nam = $this->session->userdata('nama');
        $this->load->library('upload', $config);
        $pisah = explode('/', $tanggal);
        $array = array($pisah[2], $pisah[0], $pisah[1]);
        $satukan = implode('-', $array);
        if ($nama != '' && $username != '' && $tempat != '' && $tanggal != '' && $alamat != '' && $hp != '' && $jabatan != '' && $jk != '' && $pass1 != '' && $this->upload->do_upload('foto')) {
            $this->load->library('upload', $config);
            $name = $this->upload->data();
            $file = $name['file_name'];
            $this->db->query("update karyawan set email = '$email', nama = '$nama', alamat = '$alamat',tanggallahir = '$satukan',username = '$username',password = '$pass1', foto = '$file',jeniskelamin = '$jk',hp = '$hp',tempatlahir = '$tempat',jabatan = '$jabatan' where id_karyawan = $id");
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('ManagerDataKaryawan','refresh');
        } else if ($nama != '' && $username != '' && $tempat != '' && $tanggal != '' && $alamat != '' && $hp != '' && $jabatan != '' && $jk != '' && $pass1 != '' ){
            $this->db->query("update karyawan set email = '$email', nama = '$nama', alamat = '$alamat',tanggallahir = '$satukan',username = '$username',password = '$pass1',jeniskelamin = '$jk',hp = '$hp',tempatlahir = '$tempat',jabatan = '$jabatan' where id_karyawan = $id");
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('ManagerDataKaryawan','refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('ManagerDataKaryawan','refresh');
        }
    }

}
