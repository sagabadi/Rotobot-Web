<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function download($id) {
        $this->load->helper('download');
        $filename = $this->db->query("Select * from materi where id_materi = $id");
        foreach ($filename->result() as $key):
            $field = $key->file;
            $file = file_get_contents(base_url() . 'asset/materi/' . $key->file);
        endforeach;
        force_download($field, $file);
    }

}
