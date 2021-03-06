<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UbahProfilInstruktur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('MUbahProfilInstruktur');
    }

    public function Update() {
        $config['upload_path'] = './asset/images/Karyawan';

        $config['allowed_types'] = 'jpg|png|jpeg';

        $config['max_size'] = '2048';

        $config['file_name'] = time();
        $this->load->library('upload', $config);
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $pass1 = $this->input->post('pass1');
        $pass2 = $this->input->post('pass2');
        $id = $this->session->userdata('ids');
        $nam = $this->session->userdata('nama');
        if ($pass1 == $pass2 && $pass1 != '' && $pass2 != '' && $nama != '' && $alamat != '' && $this->upload->do_upload('foto')) {
            $name = $this->upload->data();
            $file = $name['file_name'];
            $this->MUbahProfilInstruktur->UpdateProfil($nama, $alamat, $email, $pass1, $file, $id);
            $this->db->where("email", $email);
            $query = $this->db->get("karyawan");

            if ($query->num_rows() > 0) {

                foreach ($query->result() as $row) {
                    $user = array(
                        "ids" => $row->id_karyawan,
                        "username" => $row->username,
                        "nama" => $row->nama,
                        "alamat" => $row->alamat,
                        "email" => $row->email,
                    );
                    $this->session->set_userdata($user);
                    redirect('HomeInstruktur');
                }
            }
        } else if ($pass1 == $pass2 && $pass1 != '' && $pass2 != '' && $nama != '' && $alamat != '') {
            $file = '';
            $this->MUbahProfilInstruktur->UpdateProfil($nama, $alamat, $email, $pass1, $file, $id);
            $this->db->where("email", $email);
            $query = $this->db->get("karyawan");
            if ($query->num_rows() > 0) {

                foreach ($query->result() as $row) {
                    $user = array(
                        "ids" => $row->id_karyawan,
                        "username" => $row->username,
                        "nama" => $row->nama,
                        "alamat" => $row->alamat,
                        "email" => $row->email,
                    );
                    $this->session->set_userdata($user);
                    echo '<script>alert("Profil Berhasil Diubah");</script>';
                    redirect('HomeInstruktur','refresh');
                }
            }
        } else {
            echo '<script>alert("Isi Data Dengan Benar !!");</script>';
            redirect('HomeInstruktur','refresh');
        }
    }

}
