<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Upload extends CI_Controller {

   public function __construct() {

      parent::__construct();

      $this->load->model('proses');

   }

   public function index() {

      $data['file'] = $this->proses->get('upload');

      $this->load->view('upload', $data);

   }

   public function upload() {

      $config['upload_path'] = './asset/images/'; //folder tempat menyimpan file gambar

      $config['allowed_types'] = 'jpg|png|jpeg'; //type yang diperbolehkan

      $config['max_size'] = '2048'; //ukuran maksimal yang diperbolehkan

      $config['file_name'] = time(); //nama file nantinya

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('foto')) {

         $nama = $this->upload->data();

         $keterangan = $this->input->post('keterangan', TRUE);

         $data = array ('gambar' => $nama['file_name'], 'keterangan' => $keterangan);

         $this->proses->insert('upload', $data);

         redirect('upload');

      } else {

         echo 'error';

      }

   }

}