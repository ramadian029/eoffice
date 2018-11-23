<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {


	public function __construct(){

        parent::__construct();
        if(empty($_SESSION)){
            redirect(base_url());
        }
		$this->load->model(array('Jenis_infrastruktur_m'));
	}
	
	public function index(){
        
    }

    public function infrastruktur($aktif = null){
        $aktif = $aktif;
        $list_infrastruktur = $this->Jenis_infrastruktur_m->get_data($id = null, $nama = null)->result();
        foreach($list_infrastruktur as $rows){
            $url = "kondisi-infrastruktur/".strtolower($rows->nama_infrastruktur);
            echo '<li id="menu_kondisi_infrastruktur" class="'.((strtolower($rows->nama_infrastruktur) == $aktif)? "active":"").'">';
            echo '<a href="'.site_url("$url").'">';
            echo '<i class="fa fa-circle-o"></i> <span>'.$rows->nama_infrastruktur.'</span>';
            echo '</a>';
            echo '</li>';
        }
    }
	
}
