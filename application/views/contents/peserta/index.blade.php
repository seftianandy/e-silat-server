@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-primary">
            <div class="box-header with-border" style="padding-bottom: 3rem;">
              <h3 class="box-title">Daftar Peserta / Atlit</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-peserta">
                  <i class="fa fa-upload"> Upload Data Peserta</i>
                </button>
                <button type="button" class="btn btn-md btn-danger" id="resetData">
                  <i class="fa fa-trash"> Reset Data</i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive" id="data">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>Data Peserta</th>
                    {{-- <th width="350">Logo Tim / Foto</th> --}}
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

  <div class="modal fade" id="modal-peserta">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">
            Import Data Peserta
          </h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label class="col-sm-2 control-label">Upload File Excel</label>
              <div class="col-sm-10">
                <input type="file" id="file" name="file" class="form-control" placeholder="Masukkan file" required />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <span class="text-danger">*</span> Untuk format excel bisa di download melalui tombol dibawah ini.
                <br>
                <span class="text-danger">* Harap klik tombol simpan satu kali saja agar data tidak terduplikat!</span> 
                <p></p>
                <a href="{{base_url()}}dist/file/contoh upload pesertas.xls" class="btn btn-sm btn-success"><i class="fa fa-download"></i> Download format excel</a>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
          <button type="button" id="tambahData" class="btn btn-success">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"> --}}
@endsection

@section('js')
  <!-- DataTables -->
  <script src="<?= base_url() ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  {{-- <script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script> --}}
  <script src="<?= base_url() ?>assets/peserta/peserta.js"></script>
@endsection

@extends('layouts.themplate')
