<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MUbahProfilSiswa extends CI_Model {

	function UpdateProfil($name, $alamat, $email, $password,$foto,$id) {
		if($foto != '') {
			$this->db->query ("Update siswa set nama = '$name',alamat = '$alamat',email = '$email', password = '$password',foto = '$foto' where id_siswa = '$id'");
		} else {
			$this->db->query ("Update siswa set nama = '$name',alamat = '$alamat',email = '$email', password = '$password' where id_siswa = '$id'");
		}
	}

}
