<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MProfilSiswa extends CI_Model {

    function GetNama() {
        $data = $this->session->userdata('usernametutorial');
        $name = $this->db->query("Select nama from siswa where username = '$this->session->userdata('usernametutorial')'")->result();
        return $name;
    }
    
    function GetAlamat() {
        $data = $this->session->userdata('usernametutorial');
        $alamat = $this->db->query("Select alamat from siswa where username = '$data'")->result();
        return $alamat;
    }
    function GetEmail() {
        $data = $this->session->userdata('usernametutorial');
        $email = $this->db->query("Select email from siswa where username = '$data'")->result();
        return $email;
        
    }

}
