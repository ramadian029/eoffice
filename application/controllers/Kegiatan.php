<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        if (empty($_SESSION)) {
//            redirect(base_url());
//        }
        if ($_SESSION['level'] > 1) {
            redirect(base_url());
        }
    }

    public function index() {
        $data['title'] = 'Data Kegiatan';
        $data['aktif'] = 'kegiatan';
        $data['judul'] = 'Data Kegiatan';
        $data['subview'] = "kegiatan/home";
        $this->load->view('layout/layout', $data);
    }

    public function daftar() {
        $data['title'] = 'Data Kegiatan';
        $data['aktif'] = 'kegiatan';
        $data['judul'] = 'Data Kegiatan';
        $data['subview'] = "kegiatan/daftar";
        $this->load->view('layout/layout', $data);
    }


}
