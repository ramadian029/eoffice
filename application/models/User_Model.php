<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
	
	public function cek_user($data) {
        $query = $this->db->get_where('user', $data);
        return $query;
    }

	public function getAllPengguna(){
        $query ="SELECT u.*,s.* FROM user u JOIN skpd s ON u.id_skpd = s.id_skpd";
        var_dump($query);die();
    
        return $query->result();
    }
	// public function data_pengguna(){
	// 	$query ="SELECT * FROM `user` order by user_id desc";
	// 	return $query->result();
	// }

	public function level_user(){
		$select ="SELECT * FROM level_user ORDER BY level ASC";
		return $this->db->query($select)->result();
	}

	public function data_kelurahan(){
		$select = "SELECT * FROM data_kelurahan WHERE flag = '0' ORDER BY kode_kel ASC ";
		return $this->db->query($select)->result();
	}

	public function save($data = null, $id_user = null){
		$cek_data = $this->data_pengguna($id_user, $data['username']);
		if($cek_data->num_rows() > 0){
			$data = array("status"=>"gagal",
						  "validasi"=>'<font color="#eb3a28"><i class="fa fa-close(alias)">&nbsp;</i><strong>Username sudah digunakan</strong></font>');
		}else{
			if($id_user != null){
				// EDIT DATA
				$this->db->where(array("md5(id_user)"=>$id_user));
				$query = $this->db->update("user",$data);
	
				if($query){
					$data = array("status"=>"sukses",
								  "validasi"=>'<font color="#009900"><i class="fa fa-check-square">&nbsp;</i><strong>Data berhasil diedit</strong></font>');
				}else{
					$data = array("status"=>"gagal",
								  "validasi"=>'<font color="#eb3a28"><i class="fa fa-close(alias)">&nbsp;</i><strong>Data gagal diedit</strong></font>');
				}
			}else{
				// SIMPAN DATA
				$save = $this->db->insert("user", $data);
				if($save){
					$data = array("status"=>"sukses",
								"validasi"=>'<font color="#009900"><i class="fa fa-check-square">&nbsp;</i><strong>Data berhasil disimpan</strong></font>');
				}else{
					$data = array("status"=>"gagal",
								"validasi"=>'<font color="#eb3a28"><i class="fa fa-close(alias)">&nbsp;</i><strong>Data gagal disimpan</strong></font>');
				}
			}
		}
        echo json_encode($data);
	}

	public function delete($id_user = null){
		$this->db->where(array("md5(id_user)"=>$id_user));
		$this->db->delete("user");
	}
}
