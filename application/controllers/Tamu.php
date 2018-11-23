<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($_SESSION['level'] > 1) {
            redirect(base_url());
        }
    }

    public function index() {
        $data['title'] = 'Daftar Tamu';
        $data['aktif'] = 'daftar_tamu';
        $data['judul'] = 'Daftar Tamu';
        $data['subview'] = "tamu/home";
        $this->load->view('layout/layout', $data);
    }

    public function daftar() {
        $data['title'] = 'Daftar Tamu';
        $data['aktif'] = 'daftar_tamu';
        $data['judul'] = 'Daftar Tamu';
        $data['subview'] = "tamu/daftar";
        $this->load->view('layout/layout', $data);
    }


}
