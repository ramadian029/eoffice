<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($_SESSION['level'] > 1) {
            redirect(base_url());
        }
    }

    public function index() {
        $data['title'] = 'Kelola Tata Surat';
        $data['aktif'] = 'surat';
        $data['judul'] = 'Kelola Tata Surat';
        $data['subview'] = "surat/home";
        $this->load->view('layout/layout', $data);
    }



}
