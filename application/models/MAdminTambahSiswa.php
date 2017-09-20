<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MAdminTambahSiswa extends CI_Model {

    function insert($name, $alamat, $email, $password,$foto,$id,$tempat,$tanggallahir,$username,$jeniskelamin,$hp) {
        $this->db->query ("Update admin set nama = '$name',alamat = '$alamat',email = '$email', password = '$password', foto='$foto' where nama = '$nam'");
    }

}
