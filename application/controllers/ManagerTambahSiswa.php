<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerTambahSiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert() {
        $config['upload_path'] = './asset/images/Siswa/';

        $config['allowed_types'] = 'jpg|png|jpeg';

        $config['max_size'] = '2048';
        date_default_timezone_set("Asia/Jakarta");
        $now = date('Y-m-d');
        $config['file_name'] = time();
        $username = $this->input->post('username');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tanggallahir');
        $alamat = $this->input->post('alamat');
        $hp = $this->input->post('hp');
        $jk = $this->input->post('jeniskelamin');
        $email = $this->input->post('email');
        $pass1 = $this->input->post('password');
        $nam = $this->session->userdata('nama');
        $this->load->library('upload', $config);
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $sekolah = $this->input->post('sekolah');
        $query = $this->db->query("Select * from siswa")->num_rows();
        if ($query == 0) {
            $id = 101;
        } else {
            $id1 = $this->db->query("Select max(id_siswa)+1 as max from siswa")->row();
            $id = $id1->max;
        }
        $ada = $this->db->query("Select * from siswa where username = '$username'")->num_rows();
        $name = $this->upload->data();
        $file = $name['file_name'];
        $pisah = explode('/', $tanggal);
        $array = array($pisah[2], $pisah[0], $pisah[1]);
        $satukan = implode('-', $array);
        if ($ada == 0) {
            if ($nama != '' && $username != '' && $tempat != '' && $tanggal != '' && $alamat != '' && $hp != '' && $jk != '' && $sekolah != '' && $kelas != 0 && $pass1 != '' && $this->upload->do_upload('foto')) {
                $this->load->library('upload', $config);
                $this->db->query("insert into siswa values ($id,'$email','$username','$pass1','$nama','$satukan','$alamat','$file','$jk','$hp','$tempat','$sekolah',$kelas,'$now')");
                echo '<script>alert("Data Berhasil Ditambah");</script>';
                redirect('ManagerDataSiswa','refresh');
            } else if ($nama != '' && $username != '' && $tempat != '' && $tanggal != '' && $alamat != '' && $hp != '' && $jk != '' && $sekolah != '' && $kelas != 0 && $pass1 != '') {
                $this->db->query("insert into siswa values ($id,'$email','$username','$pass1','$nama','$satukan','$alamat','','$jk','$hp','$tempat','$sekolah',$kelas,'$now')");
                echo '<script>alert("Data Berhasil Ditambah");</script>';
                redirect('ManagerDataSiswa','refresh');
            } else {
                echo '<script>alert("Isi Data Dengan Benar!!");</script>';
                redirect('ManagerDataSiswa','refresh');
            }
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('ManagerDataSiswa','refresh');
        }
    }

}
