<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class insertPembayaranEmail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function send() {

        $config['upload_path'] = './asset/images/Pembayaran/';

        $config['allowed_types'] = 'jpg|png|jpeg';

        $config['max_size'] = '2048';

        $config['file_name'] = time();
        $this->load->library('upload', $config);
        $username = $this->input->post('username');
        $norek = $this->input->post('norek');
        $namapengirim = $this->input->post('namapengirim');
        $bayar = $this->input->post('bayar');
        $keterangan = $this->input->post('keterangan');
        $name = $this->upload->data();
        if ($username !="") {
            $cek1 = $this->db->query("Select * from siswa where username = '$username'")->num_rows();
            $idsi = $this->db->query("Select id_siswa as ma from siswa where username = '$username'")->row();
            $ids = $idsi->ma;
            $query = $this->db->query("Select * from pembayaranemail")->num_rows();
            $cek = $this->db->query("Select * from pembayaran where id_siswa = $ids")->num_rows();
        } else {
            echo '<script>alert("Isi Data Dengan Benar!!");</script>';
            redirect('login','refresh');
        }
        if ($query == 0) {
            $id = 1;
        } else {
            $id1 = $this->db->query("Select max(id_bayar)+1 as max from pembayaranemail")->row();
            $id = $id1->max;
        }
        if ($cek1 > 0) {
            $date = date('Y-m-d');
            $file = $name['file_name'];
            if ($username != '' && $norek != '' && $namapengirim != '' && $bayar != 0 && $keterangan != '' && $this->upload->do_upload('foto')) {
                $this->load->library('upload', $config);
                $this->db->query("insert into pembayaranemail values($id,$ids,'$namapengirim','$norek','$keterangan','$date',$bayar,$file)");

   //konfigurasi email
                $config = array();
                $config['charset'] = 'utf-8';
   $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
   $config['protocol']= "smtp";
   $config['mailtype']= "html";
   $config['smtp_host']= "ssl://smtp.gmail.com";
   $config['smtp_port']= "465";
   $config['smtp_timeout']= "5";
   $config['smtp_user']= "aprayitno084@gmail.com";              //isi dengan email anda
   $config['smtp_pass']= "ahmadbustomi19";            // isi dengan password dari email anda
   $config['crlf']="\r\n";
   $config['newline']="\r\n";  
   $config['wordwrap'] = TRUE;

 //memanggil library email dan set konfigurasi untuk pengiriman email
   $emil = $this->db->query("Select * from email");
   $this->email->initialize($config);
   
 //konfigurasi pengiriman kotak di view ke pengiriman email di gmail
   $this->email->from('bagasunknown@gmail.com');
   foreach($emil->result() as $key) {
    $this->email->to($key->email);
    }
$this->email->subject('Rotobot');
$this->email->message('Diterima pada tanggal : '.$date.' dari username : '.$username.' dengan nomor rekening : '.$norek.'. Nominal yang dibayar adalah : Rp.'.$bayar);
$this->email->attach('./asset/images/Pembayaran/'.$file.'.jpg');
$this->email->attach('./asset/images/Pembayaran/'.$file.'.png');
$this->email->attach('./asset/images/Pembayaran/'.$file.'.jpeg');
if($this->email->send())
{
    echo '<script>alert("Data Telah Dikirimkan Ke Admin Rotobot. Akun Anda Akan Aktif Setelah Mendapat Konfirmasi Dari Admin Rotobot");</script>';
    redirect('login','refresh');
}else{
    echo '<script>alert("Email Gagal Dikirm, Coba Beberapa Saat Lagi!!");</script>';
    redirect('login','refresh');
}

} else {
    echo '<script>alert("Isi Data Dengan Benar!!");</script>';
    redirect('login','refresh');
}
} else {
    echo '<script>alert("Username Tidak Ada!!");</script>';
    redirect('login','refresh');
}
}

}
