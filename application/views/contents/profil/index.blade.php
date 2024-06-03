@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{base_url()}}dist/img/avatar5.png" alt="User profile picture">

              <h3 class="profile-username text-center">{{$_SESSION['nama']}}</h3>

              <p class="text-muted text-center">NIP : {{$_SESSION['no_induk']}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang Saya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <strong><i class="fa fa-male margin-r-5"></i> <i class="fa fa-female margin-r-5"></i> Jenis Kelamin</strong>

              <p class="text-muted">
                Perempuan
              </p>

              <hr>

              <strong><i class="fa fa-phone margin-r-5"></i> No. Hp</strong>

              <p class="text-muted">082</p>

              <hr>

              <strong><i class="fa fa-book margin-r-5"></i> Mengajar</strong>

              <p>
                <span class="label label-danger">Bahasa Indonesia</span>
                <span class="label label-success">Matematiak</span>
                <span class="label label-info">Javascript</span>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profil" data-toggle="tab">Pengaturan Profil</a></li>
              <li><a href="#settings" data-toggle="tab">Pengaturan Akun</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="profil">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">No. Hp</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Photo Profil</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                    <h3 style="margin-bottom: 2em;">
                        Ubah Password
                    </h3>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password Lama</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password Baru</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Konfirm Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>bower_components/select2-bootstrap/dist/select2-bootstrap.min.css">
@endsection

@section('js')
    <!-- DataTables -->
    <script src="<?= base_url() ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>assets/pengajar/pengajar.js"></script>
@endsection

@extends('layouts.themplate')
