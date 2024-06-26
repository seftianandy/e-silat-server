@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="modal modal-warning fade" id="modal-ronde">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title">Ronde akan diperbaharui dalam waktu</h4>
            <h2 class="modal-title" id="title_ronde">5</h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal modal-default fade" id="modal-merah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center bg-red">
            <h4 class="modal-title">VOTE</h4>
            <h2 class="modal-title" id="title_merah"></h2>
          </div>
          <div class="modal-body">
            <table class="table table-bordered" id="getDataVoteM">
              <tr>
                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 1</th>
                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 2</th>
                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 3</th>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal modal-default fade" id="modal-biru">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center bg-yellow">
            <h4 class="modal-title">VOTE</h4>
            <h2 class="modal-title" id="title_biru"></h2>
          </div>
          <div class="modal-body">
            <table class="table table-bordered" id="getDataVoteB">
              <tr>
                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 1</th>
                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 2</th>
                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 3</th>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="container" style="background-color: #fff;">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body table-responsive">
							<table class="table">
								<tr>
									<td class="text-left">
										<img id="logokiri" alt="Logo kop kiri" style="max-height: 10rem;">
									</td>
									<td class="text-center col-4 font-weight-bold h1" id="kop" colSpan="10">
									</td>
									<td class="text-right">
										<img id="logokanan" alt="Logo kop kanan" style="max-height: 10rem;">
									</td>
								</tr>
							</table>
              <div
                style="color: white; text-align: center; left: 0; right: 0; background: linear-gradient(to right, #f00, #00f);">
                <h1>PAPAN SKOR</h1>
              </div>
							<table class="table">
								<tr>
									<td class="text-right">
										<img id="logoMerah" alt="logomerah" style="max-height: 10rem;">
									</td>
									<td class="text-left" colSpan="4" style="text-transform: uppercase; vertical-align: middle;">
										<strong id="kontingen_merah" style="font-size: 2.5rem"></strong>
										<strong class="text-danger" style="font-size: 2rem; text-transform: uppercase; vertical-align: middle;">
											<p id="nama_atlit_merah"></p>
										</strong>
									</td>
									<td class="text-center col-4 font-weight-bold h1" colSpan="10">
										<span id="timer">00:00:00</span>
									</td>
									<td class="text-right" colSpan="4" style="text-transform: uppercase; vertical-align: middle;">
										<strong id="kontingen_biru" style="font-size: 2.5rem"></strong>
										<strong class="text-info" style="font-size: 2rem; text-transform: uppercase; vertical-align: middle;">
											<p id="nama_atlit_biru"></p>
										</strong>
									</td>
									<td>
										<img id="logoBiru" alt="logobiru" style="max-height: 10rem;">
									</td>
								</tr>
							</table>
              <table class="table">
                <tbody>
                  <tr>
                    <td
                      style="color: white; text-align: center; left: 0; right: 0; background: linear-gradient(to right, #f00, #00f); text-transform: uppercase;"
                      class="text-center font-weight-bold" colspan="10" id="papan_pertandingan">
                      MONITOR PENILAIAN (ARENA) - <span id="arena"></span> <span id="pertandingan"></span>
                      <!-- MONITOR PENILAIAN (ARENA) - <span id="arena"></span> tanding -->
                    </td>
                  </tr>
                </tbody>
              </table>

              <table class="table" style="height: 30vh;">
                <tr>
									<!-- end nilai tim merah -->
									<!-- tim merah -->
									<td colspan="3">
										<table style="width: 100%">
											<tr>
												<td class="text-center">
													<img src="{{base_url()}}dist/img/Binaan1.png" alt="Binaan1.png" id="bin_m1" width="50" height="50" />
												</td>
												<td class="text-center">
													<img src="{{base_url()}}dist/img/Binaan2.png" alt="Binaan2.png" id="bin_m2" width="50" height="50" />
												</td>
											</tr>
										</table>
									</td>
									<!-- end tim merah -->
									<!-- nilai tim merah -->
									<td class="text-center bg-red" width="350" rowspan="3" style="vertical-align: middle; font-size: 100px;">
										<strong>
											<span id="nilaiMerah">0</span>
										</strong>
									</td>
                  <!-- ronde -->
                  <td rowspan="3" width="100" style="padding: 0">
                    <table class="table" style="height: 100%;" id="loadRonde">
                    </table>
                  </td>
                  <!-- end ronde -->
									<!-- nilai tim biru -->
									<td class="text-center bg-primary" width="350" style="vertical-align: middle; font-size: 100px;" rowspan="3">
										<strong id="nilaiBiru">0</strong>
									</td>
									<!-- end nilai tim biru -->
									<!-- tim biru -->
									<td colspan="3">
										<table style="width: 100%">
											<tr>
												<td class="text-center">
													<img src="{{base_url()}}dist/img/Binaan1.png" alt="Binaan1.png" id="bin_b1" width="50" height="50" />
												</td>
												<td class="text-center">
													<img src="{{base_url()}}dist/img/Binaan2.png" alt="Binaan2.png" id="bin_b2" width="50" height="50" />
												</td>
											</tr>
										</table>
									</td>
									<!-- end tim biru -->
                </tr>
                <tr>
									<!-- tim merah -->
									<td colspan="3">
										<table style="width: 100%">
											<tr>
												<td class="text-center">
													<img src="{{base_url()}}dist/img/Teguran1.png" alt="Teguran1.png" id="teg_m1" width="50" height="50" />
												</td>
												<td class="text-center">
													<img src="{{base_url()}}dist/img/Teguran2.png" alt="Teguran2.png" id="teg_m2" width="50" height="50" />
												</td>
											</tr>
										</table>
									</td>
									<!-- end tim merah -->
									<!-- tim biru -->
                  <td colspan="3">
                    <table style="width: 100%">
                      <tr>
                        <td class="text-center">
                          <img src="{{base_url()}}dist/img/Teguran1.png" alt="Teguran1.png" id="teg_b1" width="50" height="50" />
                        </td>
                        <td class="text-center">
                          <img src="{{base_url()}}dist/img/Teguran2.png" alt="Teguran2.png" id="teg_b2" width="50" height="50" />
                        </td>
                      </tr>
                    </table>
                  </td>
                  <!-- end tim biru -->
                </tr>
                <tr>
									<!-- tim merah -->
									<td>
										<img src="{{base_url()}}dist/img/Peringatan.png" alt="Peringatan1.png" id="per_m1" nilai_per="5" status="" width="30"
											height="50" />
									</td>
									<td>
										<img src="{{base_url()}}dist/img/Peringatan.png" alt="Peringatan2.png" id="per_m2" nilai_per="10" status="" width="30"
											height="50" />
									</td>
									<td>
										<img src="{{base_url()}}dist/img/Peringatan.png" alt="Peringatan3.png" id="per_m3" nilai_per="15" status="" width="30"
											height="50" />
									</td>
									<!-- end tim merah -->
									<!-- tim biru -->
                  <td class="text-right">
                    <img src="{{base_url()}}dist/img/Peringatan.png" alt="Peringatan1.png" id="per_b1" nilai_per="5" status="" width="30" height="50" />
                  </td>
                  <td class="text-right">
                    <img src="{{base_url()}}dist/img/Peringatan.png" alt="Peringatan2.png" id="per_b2" nilai_per="10" status="" width="30" height="50" />
                  </td>
                  <td class="text-right">
                    <img src="{{base_url()}}dist/img/Peringatan.png" alt="Peringatan3.png" id="per_b3" nilai_per="15" status="" width="30" height="50" />
                  </td>
                  <!-- end tim biru -->
                </tr>
              </table>

              <table table class="table">
                <tbody>
                  <tr style="background-color: #9e9e9e;">
										<td class="text-center font-weight-bold" id="puk_jm1">JURI 1</td>
										<td class="text-center font-weight-bold" id="puk_jm2">JURI 2</td>
										<td class="text-center font-weight-bold" id="puk_jm3">JURI 3</td>
                    <td class="col-1">
                      <div class="row text-center">
                        <div>
                          <img src="{{base_url()}}dist/img/Tinju.png" alt="TinjuM.png" width="30" height="30" />
                        </div>
                      </div>
                    </td>
                    <td class="col-1">
                      <div class="row text-center">
                        <div>
                          <img src="{{base_url()}}dist/img/Tinju.png" alt="TinjuB.png" width="30" height="30" />
                        </div>
                      </div>
                    </td>
                    <td class="text-center font-weight-bold" id="puk_jb1">JURI 1</td>
										<td class="text-center font-weight-bold" id="puk_jb2">JURI 2</td>
										<td class="text-center font-weight-bold" id="puk_jb3">JURI 3</td>
                  </tr>
                  <tr style="background-color: #dbdbdb;">
										<td class="text-center font-weight-bold" id="ten_jm1">JURI 1</td>
										<td class="text-center font-weight-bold" id="ten_jm2">JURI 2</td>
										<td class="text-center font-weight-bold" id="ten_jm3">JURI 3</td>
                    <td>
                      <div class="row text-center">
                        <div>
                          <img src="{{base_url()}}dist/img/Tendang.png" alt="TendangM.png" width="30" height="30" />
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="row text-center">
                        <div>
                          <img src="{{base_url()}}dist/img/Tendang.png" alt="TendangB.png" width="30" height="30" />
                        </div>
                      </div>
                    </td>
										<td class="text-center font-weight-bold" id="ten_jb1">JURI 1</td>
										<td class="text-center font-weight-bold" id="ten_jb2">JURI 2</td>
										<td class="text-center font-weight-bold" id="ten_jb3">JURI 3</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</div><!-- ./wrapper -->

@endsection

@section('js')

<script src="{{base_url()}}assets/pertandingan/papan-skor.js"></script>

{{-- untuk timer  --}}
<script>
    // Function to update the timer display
  function updateTimerDisplay(time) {
      document.getElementById('timer').textContent = time;
  }

  // Function to request updated time from Page B
  function fetchUpdatedTime() {
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  const response = JSON.parse(xhr.responseText);
                  updateTimerDisplay(response.time);
              }
          }
      };

      xhr.open('GET', '<?= base_url() ?>timer/getTimerB', true);
      xhr.send();
  }

  // Fetch updated time every 1 second
  setInterval(fetchUpdatedTime, 1000);
</script>
@endsection

@extends('layouts.themplate')
