@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data History Pertandingan (Log)</h3>
               
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover" id="data">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>User Akun</th>
                    <th>Nama Atlit</th>
                    <th class="text-center">Nilai</th>
                    <th>Jenis</th>
                    <th class="text-center">Ronde</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Waktu</th>
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
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

@endsection

@section('js')

<!-- DataTables -->
  <script src="<?= base_url() ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script src="<?= base_url() ?>bower_components/export/dataTables.fixedHeader.min.js"></script>
  <script src="<?= base_url() ?>bower_components/export/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>bower_components/export/responsive.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/history/log.js"></script>
<script>
$(document).ready(function() {
    $('#data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script src="<?= base_url() ?>bower_components/export/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>bower_components/export/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>bower_components/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>bower_components/export/jszip.min.js"></script>
<script src="<?= base_url() ?>bower_components/export/pdfmake.min.js"></script>
<script src="<?= base_url() ?>bower_components/export/vfs_fonts.js"></script>
<script src="<?= base_url() ?>bower_components/export/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>bower_components/export/buttons.print.min.js"></script>

@endsection

@extends('layouts.themplate')
