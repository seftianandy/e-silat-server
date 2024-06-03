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
							<small style="font-size: 1.5rem;">Aplikasi penjurian silat (v.1.11)</small>
							<br>
							<small style="font-size: 1.5rem;">
								<strong>Copyright &copy; 2023 <a href="#">CV IT TECH PRODUCTION</a>.</strong> All rights reserved.
							</small>
							<br>
							<small style="font-size: 1.5rem;">
								<strong>Contact Person : </strong> +628980195825 (Finggar).
							</small>
						</h2>
					</div>   
				</div>
			</div>
	  	</div>

		<?php if($_SESSION['role'] == 'operator') {?>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary box-solid" style="height: 100%;">
						<div class="box-header with-border">
							<h3 class="box-title">
								<b>
									<i class="fa fa-gear fa-spin"></i> Pengaturan Kop Papan Skor
								</b>
							</h3>
						</div>
						<div class="box-body">
							<div class="col-sm-3 text-left">
								<div class="input-group margin">
									<input type="file" name="logokiri" id="logokiri" class="form-control">
									<span class="input-group-btn">
										<button type="button" id='saveLogoKiri' class="btn btn-success btn-flat">
											<i class="fa fa-save"></i>
										</button>
									</span>
								</div>
								<br> <br>
								<img id="imgLogoKiri" alt="logo kiri" style="max-height: 25rem;">
							</div>
							<div class="col-sm-6">
								<textarea name="kopPertandingan" id="kopPertandingan" class="form-control" style="height: 30rem;"></textarea>
								<br>
								<button type="button" id="saveKopPertandingan" class="btn btn-success btn-block btn-md">
									<i class="fa fa-save"></i> Simpan Kop Pertandingan
								</button>
							</div>
							<div class="col-sm-3 text-right">
								<div class="input-group margin">
									<div class="input-group margin">
										<input type="file" name="logokanan" id="logokanan" class="form-control">
										<span class="input-group-btn">
											<button type="button" id='saveLogoKanan' class="btn btn-success btn-flat">
												<i class="fa fa-save"></i>
											</button>
										</span>
									</div>
									<br> <br>
									<img id="imgLogoKanan" alt="logo kanan" style="max-height: 25rem;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')
  <script src="<?= base_url() ?>assets/dashboard/dashboard.js"></script>
	<script src="<?= base_url() ?>plugins/ckeditor/ckeditor.js"></script>

	<script>
		CKEDITOR.replace( 'kopPertandingan' );
	</script>
@endsection

@extends('layouts.themplate')
