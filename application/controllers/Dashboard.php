<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {

        parent::__construct();
//        if (empty($_SESSION)) {
//            redirect(base_url());
//        }
    }


    public function index() {
        $data['title'] = 'Dashboard - EOffice Kabupaten Barru';
        $data['aktif'] = 'Dashboard';
        $data['judul'] = 'Dashboard';
        $data['subview'] = "dashboard/dashboard";
        $this->load->view('layout/layout', $data);
    }
   

}
