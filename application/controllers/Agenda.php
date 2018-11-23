<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

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
        $data['title'] = 'Data Agenda';
        $data['aktif'] = 'agenda';
        $data['judul'] = 'Data Agenda';
        // $data['sub_menu_infra'] = $this->list_infra();
        $data['subview'] = "agenda/home";
        $this->load->view('layout/layout', $data);
    }

    public function daftar() {
        $data['title'] = 'Data Agendaan';
        $data['aktif'] = 'agenda';
        $data['judul'] = 'Data Agenda';
        // $data['sub_menu_infra'] = $this->list_infra();
        $data['subview'] = "agenda/daftar";
        $this->load->view('layout/layout', $data);
    }

    public function tambahDaftar(){
        $nama = $this->input->post('nama_agenda');
        $tanggal = $his->input->post('tanggal');
        $waktu = $this->input->post('waktu');
        $tempat = $this->input->post('tempat');
        $kuota = $this->input->post('kuota');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
                'nama_agenda' => $nama,
                'tanggal' => $tanggal,
                'waktu' => $waktu,
                'tempat' =>  $tempat,
                'kuota' => $kuota,
                'deskripsi' => $deskripsi);

       $simpan = $this->Daftarhadir_Model->tambah($data);
       if ($simpan) {
                   $msg = true;
        }    
         echo json_encode($msg);    
    }


}
