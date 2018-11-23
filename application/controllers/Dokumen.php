<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        if (empty($_SESSION)) {
//            redirect(base_url());
//        }
        if ($_SESSION['level'] > s) {
            redirect(base_url());
        }
    }

    public function index() {
        $data['title'] = 'Kelola Dokumen & Arsip';
        $data['aktif'] = 'dokumen';
        $data['judul'] = 'Kelola Dokumen & Arsip';
        $data['subview'] = "dokumen/home";
        $this->load->view('layout/layout', $data);
    }



}
