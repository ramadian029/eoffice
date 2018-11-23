<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarhadir_Model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function tambah($data){
			$this->db->insert('agenda', $data);
			return $this->db->insert_id();
	}
}
