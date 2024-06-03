$(document).ready(function () {
	cekHariIni();
	getData();

	$(document).on("click", "#saveLogoKiri", function () {
		var posisi = "kiri";
		updateLogo(posisi);
	});

	$(document).on("click", "#saveLogoKanan", function () {
		var posisi = "kanan";
		updateLogo(posisi);
	});

	$(document).on("click", "#saveKopPertandingan", function () {
		var editor = CKEDITOR.instances['kopPertandingan']; 
		if (editor) {
			var nilaiEditor = editor.getData();
			updateKop(nilaiEditor);
		} else {
			console.error('CKEditor tidak ditemukan');
		}
	});

	function tanggalIndo(tanggal) {
		var date = new Date(tanggal);
		var hari = date.getDay();
		switch (hari) {
			case 0:
				hari = "minggu";
				break;
			case 1:
				hari = "senin";
				break;
			case 2:
				hari = "selasa";
				break;
			case 3:
				hari = "rabu";
				break;
			case 4:
				hari = "kamis";
				break;
			case 5:
				hari = "jum'at";
				break;
			case 6:
				hari = "sabtu";
				break;
		}
		return (hari);
	}

	function cekHariIni() {
		var data = new Date().toISOString().slice(0, 10);
		var hari = tanggalIndo(data);
		$.ajax({
			type: "POST",
			url: "jadwalmengajarhariini",
			data: { hari: hari },
			dataType: "json",
			success: function (data) {
				$("#loadJadwalHariIni").fadeOut();
				num = 1;
				var html = "";
				var i;
				for (i = 0; i < data.length; i++) {
					html +=
						"<div class='row' style='margin-bottom: 2em'> " +
						"<div class='col-sm-12'>" +
						"<h4 style='margin-bottom: 1.5em;'>" +
						data[i].nama_mapel +
						" <span class='label label-success'>" +
						data[i].kode +
						"</span></h4>" +
						"<span class='text-muted'><i class='fa fa-clock-o'></i>&nbsp;&nbsp;Jam Ke <span class='text-danger'><b>" +
						data[i].jam_mulai +
						" (" +
						data[i].mulai_start +
						" - " +
						data[i].mulai_end +
						") - " +
						data[i].jam_akhir +
						" (" +
						data[i].akhir_start +
						" - " +
						data[i].akhir_end +
						")</b></span></span> <p></p>" +
						"<span class='text-muted'><i class='fa fa-bookmark'></i>&nbsp;&nbsp; " +
						data[i].nama_kelas +
						"-" +
						data[i].nama_jurusan;
					if (data[i].urut_kelas != 0) {
						html += "-" + data[i].urut_kelas;
					}
					html +=
						"</span> <p></p>" +
						"<span class='text-muted'><i class='fa fa-building-o'></i>&nbsp;&nbsp;" +
						data[i].kode_ruang +
						"</span>" +
						"</div>" +
						"</div>";
				}
				$("#getDataHariIni").html(html);
			},
		});
	}

	function getData() {
		$.ajax({
			type: "GET",
			url: "datakop",
			async: false,
			dataType: "json",
			success: function (data) {
				var i;
				for (i = 0; i < data.length; i++) {
					$("#kopPertandingan").text(data[i].kop);

					if (data[i].logokiri !== null && data[i].logokiri !== '') {
						$("#imgLogoKiri").attr('src', 'data:image/jpeg;base64,' + data[i].logokiri);
					} else {
						$("#imgLogoKiri").attr('src', 'dist/img/noimage.png');
					}

					if (data[i].logokanan !== null && data[i].logokanan !== '') {
						$("#imgLogoKanan").attr('src', 'data:image/jpeg;base64,' + data[i].logokanan);
					} else {
						$("#imgLogoKanan").attr('src', 'dist/img/noimage.png');
					}

				}
			},
		});
	}

	function updateLogo(posisi) {
		// var pic = $('#uploadLogo' + dataId).prop('files')[0];
		// console.log(dataId)
		// console.log(value);
		var formData = new FormData();
		formData.append('file', $('#logo' + posisi)[0].files[0]);
		formData.append('id', 1);
		formData.append('posisi', posisi);


		$.ajax({
			type: "POST",
			url: "updatelogokop",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function (response) {
				// console.log(response);
				getData();
				Swal.fire({
					position: "center",
					icon: "success",
					title: "Data berhasil ditambahkan !",// Ubah pesan sukses sesuai respons dari server
					showConfirmButton: false,
					timer: 2000,
				});
			},
			error: function (xhr, status, error) {
				getData();
				Swal.fire({
					position: "center",
					icon: "error",
					title: "Data gagal disimpan",
					showConfirmButton: false,
					timer: 2000,
				});
			}
		});
	}

	function updateKop(data) {
		var formData = new FormData();
		formData.append('kop', data);

		$.ajax({
			type: "POST",
			url: "updatekop",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function (response) {
				// console.log(response);
				getData();
				Swal.fire({
					position: "center",
					icon: "success",
					title: "Data berhasil ditambahkan !",// Ubah pesan sukses sesuai respons dari server
					showConfirmButton: false,
					timer: 2000,
				});
			},
			error: function (xhr, status, error) {
				getData();
				Swal.fire({
					position: "center",
					icon: "error",
					title: "Data gagal disimpan",
					showConfirmButton: false,
					timer: 2000,
				});
			}
		});
	}
});
