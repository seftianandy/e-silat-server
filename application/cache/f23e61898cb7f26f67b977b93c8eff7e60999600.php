<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Silat Skor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/plugins/iCheck/square/blue.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


  <link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">

  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/css/select2.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.min.css">


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
  <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery 3 -->
  <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
		<header class="main-header">
				<nav class="navbar navbar-static-top">
						<div class="container">
								<div class="navbar-header">
										<a href="<?php echo e(base_url()); ?>index" class="navbar-brand">
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
													<a href="<?php echo e(base_url()); ?>dashboard">
															Beranda
															<span class="sr-only">(current)</span>
													</a>
												</li>
												<?php if($_SESSION['role'] == 'operator') {?>
												<li>
													<a href="<?php echo e(base_url()); ?>akun">Daftar Akun</a>
												</li>
												<li>
													<a href="<?php echo e(base_url()); ?>nilai">Master Nilai</a>
												</li>
												<li>
													<a href="<?php echo e(base_url()); ?>peserta">Peserta</a>
												</li>
												<li>
													<a href="<?php echo e(base_url()); ?>pertandingan">Pertandingan</a>
												</li>
												<?php } ?>
												<?php if($_SESSION['role'] == 'juri_1' || $_SESSION['role'] == 'juri_2' || $_SESSION['role'] == 'juri_3') {?>
												<li>
													<a href="<?php echo e(base_url()); ?>nilaijuri">Penjurian</a>
												</li>
												<?php } ?>
												<?php if($_SESSION['role'] == 'dewan_juri') {?>
												<li>
													<a href="<?php echo e(base_url()); ?>nilaidewan">Penjurian Dewan Juri</a>
												</li>
												<?php } ?>
												<?php if($_SESSION['role'] == 'timer') {?>
												<li>
													<a href="<?php echo e(base_url()); ?>timer">Set Timer</a>
												</li>
												<?php } ?>
												<li>
													<a href="<?php echo e(base_url()); ?>logout">Logout &nbsp;&nbsp;<i class="fa fa-sign-out"></i></a>
												</li>
										</ul>
								</div>

								<div class="navbar-custom-menu">
										<ul class="nav navbar-nav">
												<li class="dropdown user user-menu">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<span><?php echo e($_SESSION['nama_user']); ?></span>
														<img src="<?php echo e(base_url()); ?>dist/img/avatar5.png" class="user-image hidden-xs" alt="User Image">
													</a>
												</li>
										</ul>
								</div>

						</div>

				</nav>
		</header>

  	<?php echo $__env->yieldContent('content'); ?>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo e(base_url()); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Slimscroll -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo e(base_url()); ?>dist/js/demo.js"></script>

	<script src="<?php echo e(base_url()); ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

	<?php echo $__env->yieldContent('js'); ?>

	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH /Users/mac/www/penjurian/application/views/layouts/themplate.blade.php ENDPATH**/ ?>