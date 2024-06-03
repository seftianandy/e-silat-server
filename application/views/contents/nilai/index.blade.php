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
              <h3 class="box-title">Master Nilai</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-condensed table-responsive table-hover">
                <thead>
                  <tr>
                    <th width="50" class="text-center">No</th>
                    <th>Jenis</th>
                    <th width="150" class="text-center">Nilai</th>
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

@section('js')
  <script src="<?= base_url() ?>assets/nilai/nilai.js"></script>
@endsection

@extends('layouts.themplate')
