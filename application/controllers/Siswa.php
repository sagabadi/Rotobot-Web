<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mkota'); //load model mkota yang berada di folder model
        $this->load->helper(array('url')); //load helper url
    }

    public function index() {
        $data['titel'] = 'Multiple Output Autocomplete Jquery UI + CodeIgniter'; //varibel title
        $this->load->view('vkota', $data); //tampilan awal ketika controller kota di akses
    }

    public function get_allkota() {
        $kode = $this->input->post('kode', TRUE); //variabel kunci yang di bawa dari input text id kode
        $query = $this->mkota->get_allkota(); //query model

        $kota = array();
        foreach ($query as $d) {
            $kota[] = array(
                'label' => $d->nama_kota, //variabel array yg dibawa ke label ketikan kunci
                'nama' => $d->nama_kota, //variabel yg dibawa ke id nama
                'ibukota' => $d->ibu_kota, //variabel yang dibawa ke id ibukota
                'keterangan' => $d->keterangan //variabel yang dibawa ke id keterangan
            );
        }
        echo json_encode($kota);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }

}
