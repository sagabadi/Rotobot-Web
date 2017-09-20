<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

    function getlogin($username, $password) {
        if ($username != '' && $password != '') {
//            $this->session->sess_destroy();
            $date = date('Y-m-d');


            //$pass = md5($password);
            $pass = $password;
            $this->db->where("username", $username);
            $this->db->where("password", $pass);
            $query = $this->db->get("siswa");
            foreach ($query->result() as $row) {
                $cek = $this->db->query("Select * from pembayaran where id_siswa = $row->id_siswa")->num_rows();
                if ($cek > 0) {
                    $idbayar = $this->db->query("Select max(id_pembayaran) as bay from pembayaran where id_siswa = $row->id_siswa ")->row();
                    $id = $idbayar->bay;
                    $bayar = $this->db->query("Select tglbayar as max from pembayaran where id_pembayaran = $id")->row();
                    $tgl = $bayar->max;
                    $selisih = $this->db->query("select datediff(CURRENT_DATE,'$tgl') as hari from pembayaran")->row();
                    $hari = $selisih->hari;
                } else {
                    $hari = 30;
                }
            }

            if ($query->num_rows() > 0 && $hari < 30) {

                foreach ($query->result() as $row) {
                    $user = array(
                        "ids" => $row->id_siswa,
                        "username" => $row->username,
                        "nama" => $row->nama,
                        "alamat" => $row->alamat,
                        "email" => $row->email,
                        "jabatan" => "Siswa",
                        );
                    $this->session->set_userdata($user);
                    redirect('Home');
                }
            } else {
                $pass = $password;
                $query = $this->db->query("Select * from karyawan where username = '$username' and password='$pass' and jabatan like'Instruktur%'");

                if ($query->num_rows() > 0) {

                    foreach ($query->result() as $row) {
                        $user = array(
                            "ids" => $row->id_karyawan,
                            "username" => $row->username,
                            "nama" => $row->nama,
                            "alamat" => $row->alamat,
                            "email" => $row->email,
                            "jabatan" => "Instruktur",
                            );
                        $this->session->set_userdata($user);
                        redirect('HomeInstruktur');
                    }
                } else {
                    $pass = $password;
                    $man = 'Admin';
                    $this->db->where("username", $username);
                    $this->db->where("password", $pass);
                    $this->db->where("jabatan", $man);
                    $query = $this->db->get("karyawan");

                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                            $user = array(
                                "ids" => $row->id_karyawan,
                                "username" => $row->username,
                                "nama" => $row->nama,
                                "alamat" => $row->alamat,
                                "email" => $row->email,
                                "jabatan" => "Admin",
                                );
                            $this->session->set_userdata($user);
                            redirect('HomeAdmin');
                        }
                    } else {
                        $pass = $password;
                        $man = 'Manager';
                        $this->db->where("username", $username);
                        $this->db->where("password", $pass);
                        $this->db->where("jabatan", $man);
                        $query = $this->db->get("karyawan");

                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {
                                $user = array(
                                    "ids" => $row->id_karyawan,
                                    "username" => $row->username,
                                    "nama" => $row->nama,
                                    "alamat" => $row->alamat,
                                    "email" => $row->email,
                                    "jabatan" => "Manager",
                                    );
                                $this->session->set_userdata($user);
                                redirect('HomeManager');
                            }
                        } else {
                            $pass = $password;
                            $man = 'Administrator';
                            $this->db->where("username", $username);
                            $this->db->where("password", $pass);
                            $this->db->where("jabatan", $man);
                            $query = $this->db->get("karyawan");

                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $row) {
                                    $user = array(
                                        "ids" => $row->id_karyawan,
                                        "username" => $row->username,
                                        "nama" => $row->nama,
                                        "alamat" => $row->alamat,
                                        "email" => $row->email,
                                        "jabatan" => "Administrator",
                                        );
                                    $this->session->set_userdata($user);
                                    redirect('HomeAdministrator');
                                }
                            } else {                
                                $pass = $password;
                                $man = 'Finance';
                                $this->db->where("username", $username);
                                $this->db->where("password", $pass);
                                $this->db->where("jabatan", $man);
                                $query = $this->db->get("karyawan");
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $row) {
                                        $user = array(
                                            "ids" => $row->id_karyawan,
                                            "username" => $row->username,
                                            "nama" => $row->nama,
                                            "alamat" => $row->alamat,
                                            "email" => $row->email,
                                            "jabatan" => "Finance",
                                            );
                                        $this->session->set_userdata($user);
                                        redirect('HomeFinance');
                                    }
                                } else {
                                    $pass = $password;
                                    $this->db->where("username", $username);
                                    $this->db->where("password", $pass);
                                    $query = $this->db->get("owner");
                                    if ($query->num_rows() > 0){
                                        foreach($query->result() as $row){
                                            $user = array(
                                                "ids" => $row->id_owner,
                                                "username" => $row->username,
                                                "nama" => $row->nama,
                                                "jabatan" => "Owner",
                                                );
                                            $this->session->set_userdata($user);
                                            redirect('HomeOwner');
                                        }
                                    } else{
                                        if ($hari < 30) {
                                            $wrong = array(
                                                "salah" => "Username atau Password anda salah"
                                                );
                                            $this->session->set_userdata($wrong);
                                        } else if ($hari >= 30) {
                                            $wrong = array(
                                                "bayar" => "Anda belum melampirkan bukti pembayaran. Silahkan lampirkan bukti pembayaran"
                                                );
                                            $this->session->set_userdata($wrong);
                                        }

                                        redirect('login');
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}
