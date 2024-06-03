
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E - Silat Skor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{base_url()}}bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="{{base_url()}}bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="{{base_url()}}bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="{{base_url()}}dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="{{base_url()}}plugins/iCheck/square/blue.css">
  
  
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>">
      <b>E</b> - Silat skor <br>
      <small style="font-size: .7em;">Aplikasi penilaian skor silat</small>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
		<?php if(isset($_GET['gagal']) == 'noakun'){ ?>
			<div class="alert alert-danger alert-dismissible" id="dangeralt">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4>Gagal!</h4>
				Akun tidak terdaftar !
			</div>
		<?php } ?>
    <form action="<?= base_url() ?>sign" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
			<div class="form-group has-feedback">
				<select class="form-control" name="role" required>
					<option value="">-- Pilih Hak Akses --</option>
					<option value="operator">Operator</option>
					<option value="timer">Timer</option>
					<option value="dewan_juri">Dewan Juri</option>
					<option value="juri_1">Juri 1</option>
					<option value="juri_2">Juri 2</option>
					<option value="juri_3">Juri 3</option>
				</select>
			</div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="lockscreen-footer text-center">
  <strong>Copyright &copy; 2023 <a href="https://ittechproduction.com/" target="blank">IT TECH
      PRODUCTION</a>.</strong><br>
  All rights reserved
</div>

<!-- jQuery 3 -->
<script src="{{base_url()}}bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{base_url()}}bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
