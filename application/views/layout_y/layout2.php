<?php 
	$data['title']	= $title;
	$data['aktif']	= $aktif;
	$data['judul']	= $judul;
	$this->load->view('layout/header',$data);
	$this->load->view('layout/sidebar',$data);
	$this->load->view('layout/judul-halaman',$data);
	$this->load->view($subview);
	$this->load->view('layout/footer2');
?>