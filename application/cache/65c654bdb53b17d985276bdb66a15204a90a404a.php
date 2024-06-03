<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang di HiLS - MEGABOY
				<small>Hybrid Learning System</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
				<div class="col-md-4">
					<h4>Jadwal mengajar hari ini</h4>
					<div class="box box-primary box-solid" style="height: 100%;">
            <div class="box-header with-border">
              <h3 class="box-title">
								<b>Senin</b>
							</h3>
            </div>
            <div class="box-body" id="getDataHariIni">
              
            </div>
            <div id="loadJadwalHariIni" class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>     
          </div>
				</div>
			</div>
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="<?= base_url() ?>assets/dashboard/dashboard.js"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.themplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\penjurian\application\views/contents/dashboard/index.blade.php ENDPATH**/ ?>