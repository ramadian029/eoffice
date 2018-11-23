<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo-m.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
		body {
			padding-top:10%;
		}
      .login-page, .register-page {
          background-image: url('<?php echo base_url("assets/images/bg_login.png") ?>');
		background-size: 100% 100%;
		background-repeat: no-repeat;
      }
      .login-box, .register-box {
          /*background-image: url('<?php echo base_url("assets/images/bg-body-login.png") ?>');*/
          /*background-size: 100% 100%;*/
          padding: 3% 0 1%;
          background: transparent;
      }
	  @media (max-width: 768px) {
		  body {
				padding-top:25%;
			}
		  .login-page, .register-page {
			  background-size: cover;
		  }
	  }
    .qe {
      background-color: #69d021 !important;
      border: 1px solid #69d021 !important;
    }
  </style>
</head>

<body class="hold-transition login-page">
<div class="login-box" style="margin-bottom: 0;margin-top: 0;">
  <div class="login-logo">
    <img src="<?php echo base_url(); ?>assets/images/logo.png" width="90%"/>
    
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" style="color:#ffffff">
    <?php
      if(isset($status)){
        echo $status;
      }
    ?>
    </p>

    <form action="<?=site_url()?>/login/cek_login" method="post">
         <!--<div class="form-group has-feedback">-->
             <p style="color: red;text-align: center"><?= isset($status) ? $status : ''?></p>
      <!--</div>-->
      <div class="form-group has-feedback">
          <span class="ikon"><i class="glyphicon glyphicon-user"></i></span><input type="username" name="username" class="form-control" placeholder="Username" required="" style="padding-left: 30px !important;">
        <!--<span class="glyphicon glyphicon-user form-control-feedback"></span>-->
      </div>
      <div class="form-group has-feedback">
          <span class="ikon"><i class="glyphicon glyphicon-lock"></i></span><input type="password" name="password" class="form-control" placeholder="Password" required="" style="padding-left: 30px !important;">
        <!--<span class="glyphicon glyphicon-lock form-control-feedback"></span>-->
      </div>
      <div class="form-group has-feedback">
        <button type="submit" class="btn btn-warning btn-block btn-flat qe">Sign In</button>
        <!-- /.col -->
      </div>
    </form>
    <br>
    <center>
          <a href="#" class="a11a"> Lupa Password ? </a>
    </center>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
