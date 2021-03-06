<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/AdminLTE.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/_all-skins.css">

  <!-- Datetimepicker -->
  <link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker-standalone.css')?>" rel="stylesheet">

  <!-- Select2 -->
  <link href="<?php echo base_url('assets/plugins/select2/css/select2.min.css')?>" rel="stylesheet">

  <!-- Datatables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/css/login-modal.css">

  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo-k.png">
  
  <link rel="stylesheet" href="<?=base_url()?>assets/css/loading.css">
  <script type="text/javascript" src="<?= base_url() ?>assets/jquery/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script> 

  <!-- Highchart -->
  <script type="text/javascript" src="<?= base_url() ?>assets/plugins/highchart/highchart_v6.0.7.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/plugins/highchart/exporting.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="loading_full" class="background" style="display:none">
  <div class="loader"></div>
</div>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
          <img src="<?php echo base_url(); ?>assets/images/logo-k.png" style="width: 100%;">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><!--<b>Admin</b>LTE-->
        <img src="<?php echo base_url(); ?>assets/images/logo.png">
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <!-- <b style="font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;margin-left: 6px;">APLIKASI RATING PELAYANAN</b> -->
      </a>
    </nav>
  </header>

  <!--MODAL UNTUK LOGIN-->
      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="loginmodal-container" style="background-color: #fff;padding:0 0 30px 0;">
              <img src="<?php echo base_url(); ?>assets/images/atas-login.jpg" style="width: 100%;">
              <br/>
              <br/>
              <form style="padding: 0 30px;">
              <input type="text" name="user" placeholder="Username">
              <input type="password" name="pass" placeholder="Password">
              <input type="submit" name="login" class="login loginmodal-submit" value="Login">
              </form>
              
              <div class="login-help">
              </div>
            </div>
          </div>
      </div>
  <!--MODAL UNTUK LOGIN-->