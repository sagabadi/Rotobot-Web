<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MDetailInstruktur extends CI_Model {

    function getlogin($username, $password) {
        if ($username != '' && $password != '') {
            //$pass = md5($password);
            $pass = $password;
            $this->db->where("username", $username);
            $this->db->where("password", $pass);
            $query = $this->db->get("siswa");

            if ($query->num_rows() > 0) {

                foreach ($query->result() as $row) {
                    $user = array(
                        "ids" => $row->id_siswa,
                        "username" => $row->username,
                        "nama" => $row->nama,
                        "alamat" => $row->alamat,
                        "email" => $row->email,
                    );
                    $this->session->set_userdata($user);
                    redirect('Home');
                }
            } else {
                $pass = $password;
                $this->db->where("username", $username);
                $this->db->where("password", $pass);
                $query = $this->db->get("instruktur");

                if ($query->num_rows() > 0) {

                    foreach ($query->result() as $row) {
                        $user = array(
                            "ids" => $row->id_instruktur,
                            "username" => $row->username,
                            "nama" => $row->nama,
                            "alamat" => $row->alamat,
                            "email" => $row->email,
                        );
                        $this->session->set_userdata($user);
                        redirect('HomeInstruktur');
                    }
                } else {
                    $pass = $password;
                    $this->db->where("username", $username);
                    $this->db->where("password", $pass);
                    $query = $this->db->get("admin");

                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                            $user = array(
                                "ids" => $row->id_admin,
                                "username" => $row->username,
                                "nama" => $row->nama,
                                "alamat" => $row->alamat,
                                "email" => $row->email,
                            );
                            $this->session->set_userdata($user);
                            redirect('HomeAdmin');
                        }
                    } else {
                        redirect('login');
                    }
                }
            }
        }
    }

}
