@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-md btn-primary btn-flat" data-toggle="modal" data-target="#modal-detail">
                  <i class="fa fa-plus"> Data</i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>Kategori Jurusan</th>
                    <th>Kelas-Jurusan</th>
                    <th width="150" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="getDataDetailKelas">
                  
                </tbody>
              </table>
            </div> 
            <div id="loadDetail" class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>    
          </div>
        </div>
        <div class="col-sm-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kelas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-md btn-primary btn-flat" data-toggle="modal" data-target="#modal-kelas">
                  <i class="fa fa-plus"> Data</i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>Kelas</th>
                    <th width="150" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="getData">
                </tbody>
              </table>
            </div>
            <div id="loadKelas" class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>     
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori Jurusan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-md btn-primary btn-flat" data-toggle="modal" data-target="#modal-kategori-jurusan">
                  <i class="fa fa-plus"> Data</i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>Kategori Jurusan</th>
                    <th width="150" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="getDataKategoriJurusan">
                  
                </tbody>
              </table>
            </div>  
            <div id="loadKategoriJurusan" class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>   
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jurusan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-md btn-primary btn-flat" data-toggle="modal" data-target="#modal-jurusan">
                  <i class="fa fa-plus"> Data</i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>Jurusan</th>
                    <th width="150" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="getDataJurusan">

                </tbody>
              </table>
            </div>
            <div id="loadJurusan" class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>     
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-kelas">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" id="tambah_kelas">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Data Kelas</h4>
          </div>
          <div class="modal-body">            
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="kelas" class="col-sm-3 control-label">Kelas Baru</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Masukkan Kelas Baru" autocomplete="off" required>
                    </div>
                  </div>  
									<div class="form-group">
                    <label for="kelas" class="col-sm-3 control-label">Nama Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukkan Nama Kelas" autocomplete="off" required>
                    </div>
                  </div>  
                </div>
              </div>          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="tambahKelas" class="btn btn-primary btn-flat">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-edit-kelas">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" id="edit_kelas">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Data Kelas</h4>
          </div>
          <div class="modal-body">            
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="kelas" class="col-sm-3 control-label">Kelas</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="id" id="edit-kelas-id">
                      <input type="text" class="form-control" name="kelas" id="edit-kelas-form" placeholder="Masukkan Kelas Baru" autocomplete="off" required>
                    </div>
                  </div>  
									<div class="form-group">
                    <label for="kelas" class="col-sm-3 control-label">Nama Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama_kelas" id="edit-nama-kelas-form" placeholder="Masukkan Nama Kelas Baru" autocomplete="off" required>
                    </div>
                  </div>  
                </div>
              </div>          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="simpanEditKelas" class="btn btn-primary btn-flat">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-kategori-jurusan">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" id="tambah_kategori_jurusan">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Data Kategori Jurusan</h4>
          </div>
          <div class="modal-body">            
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="kategori_jurusan" class="col-sm-3 control-label">Kategori Jurusan Baru</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama" id="kategori_jurusan" placeholder="Masukkan Kategori Jurusan Baru" autocomplete="off" required>
                    </div>
                  </div>  
                </div>
              </div>          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="tambahKategoriJurusan" class="btn btn-primary btn-flat">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-edit-kategori-jurusan">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" id="edit_kategori_jurusan">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Data Kategori Jurusan</h4>
          </div>
          <div class="modal-body">            
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="kategori_jurusan" class="col-sm-3 control-label">Kategori Jurusan Baru</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="id" id="edit-id-kategori-jurusan">
                      <input type="text" class="form-control" name="nama" id="edit-kategori-jurusan" placeholder="Edit Kategori Jurusan Baru" autocomplete="off" required>
                    </div>
                  </div>  
                </div>
              </div>          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="simpanEditKategoriJurusan" class="btn btn-primary btn-flat">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-jurusan">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" id="tambah_jurusan">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">
              Tambah Data jurusan
            </h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Kategori Jurusan</label>
              <div class="col-sm-8">
                <select class="form-control" name="id_kategori_jurusan" id="tampilDdataKategoriJurusan" required>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Jurusan</label>
              <div class="col-sm-8">
                <input type="text" name="nama" id="nama-jurusan" class="form-control" placeholder="Masukkan Jurusan Baru" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="tambahJurusan" class="btn btn-primary btn-flat">Simpan</button>
          </div>
        </form>	
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-edit-jurusan">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" id="edit_jurusan">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">
              Tambah Data jurusan
            </h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Kategori Jurusan</label>
              <div class="col-sm-8">
                <select class="form-control edit-e-id-kategori-jurusan" name="id_kategori_jurusan" id="tampilDdataKategoriJurusan2" required>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Jurusan</label>
              <div class="col-sm-8">
                <input type="hidden" name="id" id="edit-id-jurusan">
                <input type="text" name="nama" id="edit-nama-jurusan" class="form-control" placeholder="Masukkan Jurusan Baru" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="simpanEditJurusan" class="btn btn-primary btn-flat">Simpan</button>
          </div>
        </form>	
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" id="tambah_detail">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">
              Tambah Data Detail Kelas & Jurusan
            </h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Kategori Jurusan</label>
              <div class="col-sm-8">
                <select class="form-control" name="id_kategori_jurusan" id="tampilDdataKategoriJurusan3" required>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Kelas-Jurusan-Urut</label>
              <div class="col-sm-8">
                <div class="row">
                  <div class="col-xs-4">
                    <select name="kelas" id="id_kelas" class="form-control" required>
                    </select>
                  </div>
                  <div class="col-xs-5">
                    <select name="jurusan" id="id_jurusan" class="form-control" required>
                    </select>
                  </div>
                  <div class="col-xs-3">
                    <input type="number" name="urut_kelas" autocomplete="off" min="0" value="0" class="form-control">
                  </div>
                </div>
                <small>
                  <span class="text-danger"><i>* Kosongkan no.urut jika hanya 1 kelas</i></span>
                </small>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="tambahDetail" class="btn btn-primary btn-flat">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-edit-detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form-horizontal" id="edit_detail">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">
              Edit Data Detail Kelas & Jurusan
            </h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-4 control-label">Nama Kategori Jurusan</label>
              <div class="col-sm-8">
                <input type="hidden" name="id_detail_kelas" id="id-detai-kelas">
                <select class="form-control edit-e-id-kategori-jurusan" name="id_kategori_jurusan" id="tampilDdataKategoriJurusan4" required>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Kelas-Jurusan-Urut</label>
              <div class="col-sm-8">
                <div class="row">
                  <div class="col-xs-4">
                    <select name="kelas" id="id_kelas2" class="form-control edit-e-id-kelas" required>
                    </select>
                  </div>
                  <div class="col-xs-5">
                    <select name="jurusan" id="id_jurusan2" class="form-control edit-e-id-jurusan" required>
                    </select>
                  </div>
                  <div class="col-xs-3">
                    <input type="number" name="urut_kelas" id="edit-urut-kelas" autocomplete="off" min="0" value="0" class="form-control">
                  </div>
                </div>
                <small>
                  <span class="text-danger"><i>* Kosongkan no.urut jika hanya 1 kelas</i></span>
                </small>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" id="simpanEditDetail" class="btn btn-primary btn-flat">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('js')
  <script src="<?= base_url() ?>assets/kelas/kelas.js"></script>
  <script src="<?= base_url() ?>assets/kategori_jurusan/kategori_jurusan.js"></script>
  <script src="<?= base_url() ?>assets/jurusan/jurusan.js"></script>
  <script src="<?= base_url() ?>assets/detail_kelas/detail_kelas.js"></script>
@endsection

@extends('layouts.themplate')
