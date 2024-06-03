<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Silat Skor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<!-- Bootstrap 3.3.7 -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{base_url()}}bower_components/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="{{base_url()}}bower_components/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="{{base_url()}}bower_components/Ionicons/css/ionicons.min.css">

<link rel="stylesheet" href="{{base_url()}}dist/css/AdminLTE.min.css">

<link rel="stylesheet" href="{{base_url()}}plugins/iCheck/square/blue.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{base_url()}}bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{base_url()}}bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{base_url()}}bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="{{base_url()}}bower_components/animate/animate.min.css" />


  <link href="{{base_url()}}bower_components/jquery-ui/jquery-ui.min.js" rel="stylesheet">

  <link rel="stylesheet" href="{{base_url()}}bower_components/select2/dist/css/select2.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{base_url()}}dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="{{base_url()}}node_modules/sweetalert2/dist/sweetalert2.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <!-- jQuery 3 -->
  <script src="{{base_url()}}bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery 3 -->
  <script src="{{base_url()}}bower_components/jquery-ui/jquery-ui.min.js"></script>
</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
		<header class="main-header">
				<nav class="navbar navbar-static-top">
						<div class="container">
								<div class="navbar-header">
										<a href="{{base_url()}}index" class="navbar-brand">
												<b>E -</b>
												Silat Skor
										</a>
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
												<i class="fa fa-bars"></i>
										</button>
								</div>

								<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
										<ul class="nav navbar-nav">
												<li>
													<a href="{{base_url()}}dashboard">
															Beranda
															<span class="sr-only">(current)</span>
													</a>
												</li>
												<?php if($_SESSION['role'] == 'operator') {?>
												<li>
													<a href="{{base_url()}}akun">Daftar Akun</a>
												</li>
												<li>
													<a href="{{base_url()}}nilai">Master Nilai</a>
												</li>
												<li>
													<a href="{{base_url()}}peserta">Peserta</a>
												</li>
												<li>
													<a href="{{base_url()}}pertandingan">Pertandingan</a>
												</li>
												<li>
													<a href="{{base_url()}}history">History</a>
												</li>
												<?php } ?>
												<?php if($_SESSION['role'] == 'juri_1' || $_SESSION['role'] == 'juri_2' || $_SESSION['role'] == 'juri_3') {?>
												<li>
													<a href="{{base_url()}}nilaijuri">Penjurian</a>
												</li>
												<?php } ?>
												<?php if($_SESSION['role'] == 'dewan_juri') {?>
												<li>
													<a href="{{base_url()}}nilaidewan">Penjurian Dewan Juri</a>
												</li>
												<?php } ?>
												<?php if($_SESSION['role'] == 'timer') {?>
												<li>
													<a href="{{base_url()}}timer">Set Timer</a>
												</li>
												<?php } ?>
												<li>
													<a href="{{base_url()}}logout">Logout &nbsp;&nbsp;<i class="fa fa-sign-out"></i></a>
												</li>
										</ul>
								</div>

								<div class="navbar-custom-menu">
										<ul class="nav navbar-nav">
												<li class="dropdown user user-menu">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<span>{{$_SESSION['nama_user']}}</span>
														<img src="{{base_url()}}dist/img/avatar5.png" class="user-image hidden-xs" alt="User Image">
													</a>
												</li>
										</ul>
								</div>

						</div>

				</nav>
		</header>

  	@yield('content')
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="{{base_url()}}bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{base_url()}}bower_components/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{base_url()}}bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Slimscroll -->
	<script src="{{base_url()}}bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="{{base_url()}}bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="{{base_url()}}dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{base_url()}}dist/js/demo.js"></script>

	<script src="{{base_url()}}node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

	@yield('js')

	@yield('script')
</body>
</html>
