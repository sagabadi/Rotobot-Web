<?php

defined('BASEPATH') OR exit('No direct script allowed');

class Proses extends CI_Model {

   public function __construct() {

      parent::__construct();

   }

   public function insert($table = null, $data = null) {

      $this->db->insert($table, $data);

   }

   public function get($table = null) {

      $this->db->from($table);

      return $this->db->get();

   }

}