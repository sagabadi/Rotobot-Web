<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerUbahSiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function Update($id) {
        $config['upload_path'] = './asset/images/Siswa/';

        $config['allowed_types'] = 'jpg|png|jpeg';

        $config['max_size'] = '2048';

        $config['file_name'] = time();
        $nama = $this->input->post('nama');
        //$id = $this->input->post('id');
        $query = $this->db->query("Select * from detailsiswa")->num_rows();
        $username = $this->input->post('username');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tanggallahir');
        $alamat = $this->input->post('alamat');
        $hp = $this->input->post('hp');
        $jk = $this->input->post('jeniskelamin');
        $email = $this->input->post('email');
        $pass1 = $this->input->post('password');
        $nam = $this->session->userdata('nama');
        $sekolah = $this->input->post('sekolah');
        $kelas = $this->input->post('kelas');
        $pisah = explode('/', $tanggal);
        $array = array($pisah[2], $pisah[0], $pisah[1]);
        $satukan = implode('-', $array);
        $hubpretest = $this->input->post('pretest');
        $tanggalpretest = $this->input->post('tanggalpretest');
        $pisah1 = explode('/', $tanggalpretest);
        $array1 = array($pisah1[2], $pisah1[0], $pisah1[1]);
        $satukan1 = implode('-', $array1);
        $balaspretest = $this->input->post('balas');
        $materi = $this->input->post('materi');
        $datangpretest = $this->input->post('datang');
        $nilaipretest = $this->input->post('nilai');
        $alasan1 = $this->input->post('alasan1');
        $rekomendasikelas = $this->input->post('rekomendasi');
        $lunas1 = $this->input->post('lunas1');
        $formulir = $this->input->post('formulir');
        $kartusiswa = $this->input->post('kartu');
        $buku = $this->input->post('buku');
        $presensi = $this->input->post('presensi');
        $lunas2 = $this->input->post('lunas2');
        $alasan2 = $this->input->post('alasan2');
        $lunas3 = $this->input->post('lunas3');
        $alasan3 = $this->input->post('alas3');
        $kaos = $this->input->post('kaos');
        $tas = $this->input->post('tas');
        $kit = $this->input->post('kit');
        $sertifikatt = $this->input->post('sertifikat');
        if ($formulir == "" && $kartusiswa == "" && $buku == "" && $presensi && $alasan1 == "" && $alasan2 == "" && $alasan3 == "" && $kaos == "" && $tas == "" && $kit == "") {
            $formulir = "Tidak";
            $kartusiswa = "Tidak";
            $presensi = "Tidak";
            $alasan1 = "-";
            $alasan2 = "-";
            $alasan3 = "-";
            $kaos = "Tidak";
            $tas = "Tidak";
            $kit = "Tidak";
        }
        if ($query == 0) {
            $idd = 1;
        } else {
            $id1 = $this->db->query("Select max(id_detail)+1 as max from detailsiswa")->row();
            $idd = $id1->max;
        }
        $this->load->library('upload', $config);
        if ($nama != '' && $username != '' && $tempat != '' && $tanggal != '' && $alamat != '' && $hp != '' && $jk != '' && $pass1 != '' && $this->upload->do_upload('foto')) {
            $this->load->library('upload', $config);
            $name = $this->upload->data();
            $file = $name['file_name'];

            $this->db->query("update siswa set email = '$email', sekolah='$sekolah',kelas=$kelas, nama = '$nama', alamat = '$alamat',tanggallahir = '$satukan',username = '$username',password = '$pass1', foto = '$file',jeniskelamin = '$jk',hp = '$hp',tempatlahir = '$tempat' where id_siswa = $id");
            $detail = $this->db->query("Select * from detailsiswa where id_siswa = $id")->num_rows();
            if ($detail == 0) {
                $this->db->query("insert into detailsiswa values($idd,'$hubpretest','$satukan1','$balaspretest','$materi','$datangpretest',$nilaipretest,'$alasan1','$rekomendasikelas','$lunas1','$formulir','$kartusiswa','$buku','$presensi','$lunas2','$alasan2','$lunas3','$alasan3','$kaos','$tas','$kit','$sertifikatt',$id)");
            } else {
                $this->db->query("Update detailsiswa set hubungipretest='$hubpretest', tanggalpretest='$satukan1',balaspretest='$balaspretest',materi='$materi',datangpretest='$datangpretest',nilaipretest=$nilaipretest,alasan1='$alasan1',rekomendasikelas='$rekomendasikelas',lunas1='$lunas1',formulir='$formulir',kartusiswa='$kartusiswa',buku='$buku',presensi='$presensi',lunas2='$lunas2',alasan2='$alasan2',lunas3='$lunas3',alasan3='$alasan3',kaos='$kaos',tas='$tas',kit='$kit',sertifikat='$sertifikatt' where id_siswa = $id");
            }
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('AdministratorDataSiswa','refresh');
        } else if ($nama != '' && $username != '' && $tempat != '' && $tanggal != '' && $alamat != '' && $hp != '' && $jk != '' && $pass1 != '') {
            $this->db->query("update siswa set email = '$email', sekolah='$sekolah',kelas=$kelas, nama = '$nama', alamat = '$alamat',tanggallahir = '$satukan',username = '$username',password = '$pass1',jeniskelamin = '$jk',hp = '$hp',tempatlahir = '$tempat' where id_siswa = $id");
            $detail = $this->db->query("Select * from detailsiswa where id_siswa = $id")->num_rows();
            if ($detail == 0) {
                $this->db->query("insert into detailsiswa values($idd,'$hubpretest','$satukan1','$balaspretest','$materi','$datangpretest',$nilaipretest,'$alasan1','$rekomendasikelas','$lunas1','$formulir','$kartusiswa','$buku','$presensi','$lunas2','$alasan2','$lunas3','$alasan3','$kaos','$tas','$kit','$sertifikatt',$id)");
            } else {
                $this->db->query("Update detailsiswa set hubungipretest='$hubpretest', tanggalpretest='$satukan1',balaspretest='$balaspretest',materi='$materi',datangpretest='$datangpretest',nilaipretest=$nilaipretest,alasan1='$alasan1',rekomendasikelas='$rekomendasikelas',lunas1='$lunas1',formulir='$formulir',kartusiswa='$kartusiswa',buku='$buku',presensi='$presensi',lunas2='$lunas2',alasan2='$alasan2',lunas3='$lunas3',alasan3='$alasan3',kaos='$kaos',tas='$tas',kit='$kit',sertifikat='$sertifikatt' where id_siswa = $id");
            }
            echo '<script>alert("Data Berhasil Diubah");</script>';
            redirect('ManagerDataSiswa','refresh');
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('ManagerDataSiswa','refresh');
        }
    }

}
