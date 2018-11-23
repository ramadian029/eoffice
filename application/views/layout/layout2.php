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

<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->