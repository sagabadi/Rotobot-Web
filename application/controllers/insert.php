<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class insert extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // load database
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {

        $i = 1;
        for ($i; $i <= 4; $i++) {
            $daftar = $this->db->query("Select * from level")->num_rows();
            if ($daftar == 0) {
                $id2 = 1;
            } else {
                $id1 = $this->db->query("Select max(id_level)+1 as max from level")->row();
                $id2 = $id1->max;
            }
//            $level = "Autonomous " . $i;
            $this->db->query("insert into level values($id2,'$level','Kompetisi')");
        }
    }

}
