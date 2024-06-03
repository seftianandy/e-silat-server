<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pertandingan</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover" id="data">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th class="bg-blue">Sudut Biru</th>
                    <th class="bg-red">Sudut Merah</th>
                    <th>Rincian</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="getData">
                  
                </tbody>
              </table>
            </div> 
            <div id="loadData" class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>    
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- DataTables -->
  <script src="<?= base_url() ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/nilai-juri/pertandingan.js"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.themplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/www/penjurian/application/views/contents/nilai-juri/index.blade.php ENDPATH**/ ?>