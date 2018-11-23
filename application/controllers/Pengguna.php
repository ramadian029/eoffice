<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {


	public function __construct(){

        parent::__construct();
		$this->load->model('User_Model');
	}
	
	public function index(){
        $data['title']	= 'Manajemen Pengguna - EOffice Kabupaten Barru';
		$data['aktif']	= 'manajemen_pengguna';
		$data['judul']	= 'Manajemen Pengguna';
        $data['subview'] = "pengguna/home";
        $data['get_pengguna'] = $this->User_Model->getAllPengguna();
        //var_dump($data['get_pengguna']);die(); 
        $this->load->view('layout/layout',$data);
        $this->load->view('pengguna/list_data',$data);
    }

	public function list_data(){
        $data['get_pengguna'] = $this->User_Model->data_pengguna()->result();
        $this->load->view('pengguna/list_data',$data);
    }

    public function form($id=null){
        if($id != null){
            $data['get_user'] = $this->User_Model->data_pengguna($id)->row();
            $data['data_kelurahan'] = $this->User_Model->data_kelurahan();
        }
        $data['level_user'] = $this->User_Model->level_user();
        $this->load->view('pengguna/form',$data);    
    }

    public function option(){
        $data_kelurahan = $this->User_Model->data_kelurahan();
        foreach($data_kelurahan as $rows){
            echo "<option value='".$rows->kode_kel."'>".$rows->kode_kel." - ".$rows->nama_kel."</option>";
        }
    }

    public function save($id_user = null){
		if($id_user == null){
			$data = array('nama_pengguna'=>$this->input->post('nama_pengguna'),
						  'username'=>$this->input->post('username'),
						  'password'=>md5(sha1($this->input->post('password'))),
						  'level'=>$this->input->post('level'),
						  'kode_kelurahan'=>$this->input->post('kelurahan'),
						  'status'=>$this->input->post('status'),
						  'date_create' => date('Y-m-d H-i-s'));
		}else{
			if(empty($this->input->post('password_baru'))){
				$data = array('nama_pengguna'=>$this->input->post('nama_pengguna'),
							  'username'=>$this->input->post('username'),
							  'level'=>$this->input->post('level'),
							  'kode_kelurahan'=>$this->input->post('kelurahan'),
							  'status'=>$this->input->post('status'),
							  'date_create' => date('Y-m-d H-i-s'));
			}else{
				$data = array('nama_pengguna'=>$this->input->post('nama_pengguna'),
							  'username'=>$this->input->post('username'),
							  'password'=>md5(sha1($this->input->post('password_baru'))),
							  'level'=>$this->input->post('level'),
							  'kode_kelurahan'=>$this->input->post('kelurahan'),
							  'status'=>$this->input->post('status'),
							  'date_create' => date('Y-m-d H-i-s'));
			}
		}

        return $this->User_Model->save($data,$id_user);
    }

    public function delete($id_user = null){
        $this->User_Model->delete($id_user);
        echo 'Data berhasil dihapus';
    }
}
