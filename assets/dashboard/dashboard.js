$(document).ready(function () {
	cekHariIni();

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
});
