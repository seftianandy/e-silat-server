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
              <h3 class="box-title">Daftar Akun</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>Akun</th>
                    <th width="150" class="text-center">Role</th>
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

<?php $__env->startSection('js'); ?>
  <script src="<?= base_url() ?>assets/daftar-akun/daftar-akun.js"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.themplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\penjurian\application\views/contents/daftar-akun/index.blade.php ENDPATH**/ ?>