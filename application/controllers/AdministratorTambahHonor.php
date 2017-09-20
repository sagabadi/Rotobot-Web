<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorTambahHonor extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function insert() {
        $level = $this->input->post('level');
        $gaji = $this->input->post('gaji');
        $keterangan = $this->input->post('keterangan');
        if ($level != '' && $gaji != 0 && $keterangan != '') {
            $query = $this->db->query("Select * from honor")->num_rows();
            if ($query == 0) {
                $id = 1;
            } else {
                $id1 = $this->db->query("Select max(id_honor)+1 as max from honor")->row();
                $id = $id1->max;
            }
            $idx = $this->db->query("Select id_karyawan from absenkaryawan join karyawan using(id_karyawan) where jabatan like'$level%'")->num_rows();
            $ids = $this->db->query("Select * from absenkaryawan join karyawan using(id_karyawan) where jabatan like'$level%'");
            $idps = $this->db->query("Select id_karyawan from absensiswa join detailsiswa using(id_siswa) where rekomendasikelas like'$level%'");
            $idp = $this->db->query("Select id_karyawan from absensiswa join detailsiswa using(id_siswa) where rekomendasikelas like'$level%'")->num_rows();
            $this->db->query("insert into honor values ($id,'$level',$gaji,'$keterangan')");
            if($idx != 0){
                foreach($ids->result() as $result){
                    $this->db->query("Update absenkaryawan set id_honor = $id where id_karyawan = $result->id_karyawan");
                }
            }else if ($idp != 0){
                foreach($idps->result() as $key){
                    $this->db->query("Update absensiswa set id_honor = $id where id_karyawan = $key->id_karyawan");
                }
            }
            echo '<script>alert("Data Berhasil Ditambah");</script>';
            redirect('AdministratorDataHonor','refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('AdministratorDataHonor','refresh');
        }
    }

}
