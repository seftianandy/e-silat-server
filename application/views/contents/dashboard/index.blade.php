@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
				<div class="col-md-12">
					<div class="box box-primary box-solid" style="height: 100%;">
            <div class="box-header with-border">
              <h3 class="box-title">
								<b>Beranda</b>
							</h3>
            </div>
            <div class="box-body">
              <h2>
                Selamat datang di aplikasi E - Silat Skor <br>
                <small style="font-size: 1.5rem;">Aplikasi penjurian silat (v.1.0)</small>
              </h2>
            </div>   
          </div>
				</div>
			</div>
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')
  <script src="<?= base_url() ?>assets/dashboard/dashboard.js"></script>
@endsection

@extends('layouts.themplate')
