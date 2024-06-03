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
              <h3 class="box-title">Data User</h3>

              <div class="box-tools pull-right">
                <a href="<?= base_url() ?>downloaddatauser" class="btn btn-md btn-flat btn-default">
                  <i class="fa fa-cloud-download"> Download Data</i>
                </a>
                <button type="button" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modal-user">
                  <i class="fa fa-plus"> Data</i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover nowrap" id="data_user" style="width:100%">
                <thead>
                  <tr>
                    <th width="100" class="text-center">Username</th>
										<th>Data Diri</th>
                    <th>Info Kontak</th>
                    <th width="100" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="getDataUser">
                  
                </tbody>
              </table>
            </div>     
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-user">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" id="tambah_user">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">
              Tambah Data User
            </h4>
          </div>
          <div class="modal-body">
            <h3 style="margin-top: 13px; margin-bottom: 13px;"><font class="text-danger">*</font> Data Diri</h3>
            <div class="form-group">
              <label class="col-sm-3 control-label">NIP</label>
              <div class="col-sm-9">
                <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP" required>
                <span class="text-danger">
                  <i>*Wajib diisi untuk PNS (Pegawai Negeri Sipil)</i>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap Beserta Gelar" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <select class="form-control" name="jk" id="jk" required>
                  <option value="">-- Pilih Jenis Kelamin</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <h3 style="margin-top: 13px; margin-bottom: 13px;">Info Kontak</h3>
            <div class="form-group">
              <label class="col-sm-3 control-label">Kontak</label>
              <div class="col-sm-9">
                <input type="text" name="no_hp" id="no-hp" class="form-control" placeholder="0813XXXXXXXX" required>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-danger" style="margin-top: 13px; margin-bottom: 13px;">
                        <i>
                            *Catatan : Password akan otomatis di-generate setelah data disimpan !
                        </i>
                    </p>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="tambahUser" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-edit-user">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" id="edit_user">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">
              Edit Data User
            </h4>
          </div>
          <div class="modal-body">
            <h3 style="margin-top: 13px; margin-bottom: 13px;"><font class="text-danger">*</font> Data Diri</h3>
            <div class="form-group">
              <label class="col-sm-3 control-label">NIP</label>
              <div class="col-sm-9">
                <input type="text" name="nip" id="edit-nip" class="form-control" placeholder="Masukkan NIP" required>
                <span class="text-danger">
                  <i>*Wajib diisi untuk PNS (Pegawai Negeri Sipil)</i>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" name="nama" id="edit-nama" class="form-control" placeholder="Masukkan Nama Lengkap Beserta Gelar" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <select class="form-control" name="jk" id="edit-jk" required>
                  <option value="">-- Pilih Jenis Kelamin</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <h3 style="margin-top: 13px; margin-bottom: 13px;">Info Kontak</h3>
            <div class="form-group">
              <label class="col-sm-3 control-label">Kontak</label>
              <div class="col-sm-9">
                <input type="text" name="no_hp" id="edit-no-hp" class="form-control" placeholder="0813XXXXXXXX" required>
              </div>
            </div>
						<div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input type="email" name="email" id="edit-email" class="form-control" placeholder="email@email.com">
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-danger" style="margin-top: 13px; margin-bottom: 13px;">
                        <i>
                            *Catatan : Password akan otomatis di-generate setelah data disimpan !
                        </i>
                    </p>
                </div>
            </div>
						<input type="hidden" name="id_user" id="edit-id-user">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="simpanEditUser" class="btn btn-primary">Simpan</button>
          </div>
        </form>
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
  <script src="<?= base_url() ?>assets/user/user.js"></script>
@endsection

@extends('layouts.themplate')
