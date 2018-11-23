<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Curl');
        $this->load->model('User_Model');
    }

    public function index($status = null) {
        if (isset($_SESSION['username'])) {
            redirect(base_url("index.php/dashboard"));
        } else {
            $data['title'] = 'Login - EOffice Kabupaten Barru';
            $data['status'] = $status;
            $this->load->view('login', $data);
        }
    }

    public function cek_login() {
        $data = array('username' => $this->input->post('username', TRUE),
                        'password' => $this->input->post('password', TRUE)
            );
        
        $hasil = $this->User_Model->cek_user($data);
        if ($hasil->num_rows() == 1) {
            $result = $hasil->row();
            $data_session = array("user_id" => $result->user_id,
                "username" => $result->username,
                "password" => $result->password,
                "level" => $result->level
                );

            $this->session->set_userdata($data_session);

            redirect(base_url("index.php/dashboard"));    
        }
        else {
            $data['title'] = 'Login - EOffice Kabupaten Barru';
            $data['status'] = "Username atau Password Tidak Sesuai";
            $status = "Username atau Password Tidak Sesuai";
            $this->load->view('login', $data);
        }
    }

    
    public function keluar() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
