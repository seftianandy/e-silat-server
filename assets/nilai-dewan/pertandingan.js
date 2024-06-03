$(document).ready(function () {
	getData();

	// let table = $('#data').DataTable({
	// 	responsive: true
	// });
	// new $.fn.dataTable.FixedHeader(table);

	$(document).on("click", "#penjurian", function () {
		let id = $(this).attr("data-id");
		let ronde = $(this).attr("ronde-id");
		openNewWindows(id, ronde);
	});

	$(document).on("click", "#update-status", function () {
		let id_match = $(this).attr("data-id");
		updateStatus(id_match);
	});

	function getData() {
		$.ajax({
			type: "GET",
			url: "datapertandingan",
			async: false,
			dataType: "json",
			success: function (data) {
				$("#loadData").fadeOut();
				num = 1;
				let html = "";
				let i;
				for (i = 0; i < data.length; i++) {
					html +=
						"<tr>" +
						"<td class='text-center' style='vertical-align: middle;'>" +
						num++ +
						"</td>" +
						"<td class='bg-info' style='vertical-align: middle;'><strong>" +
						data[i].nama_atlit_biru +
						"</strong><br>" +
						data[i].kontingen_atlit_biru +
						"</td>" +
						"</td>" +
						"<td class='bg-danger' style='vertical-align: middle;'><strong>" +
						data[i].nama_atlit_merah +
						"</strong><br>" +
						data[i].kontingen_atlit_merah +
						"<td>" +
						"Partai : " + data[i].partai + "<br>" +
						"Arena : " + data[i].arena + "<br>" +
						"Pertandingan : " + data[i].pertandingan +
						"</td>" +
						"<td class='text-center' style='vertical-align: middle;'>" +
						"<button class='btn btn-sm btn-warning'  id='penjurian' " +
						(data[i].status_pertandingan === '1' ? '' : '') +
						"  data-id='" + data[i].id + "' ronde-id='" + data[i].ronde_id + "' style='margin-right: 5px;'><i class='fa fa-desktop'></i></button>" +
						"<button class='btn btn-sm " +
						(data[i].status_pertandingan === '1' ? 'btn-default' : 'btn-success') +
						"' id='update-status' " +
						(data[i].status_pertandingan === '1' ? 'disabled' : '') +
						" status-id='" + data[i].status_pertandingan + "' data-id='" +
						data[i].id +
						"'><i class='fa " +
						(data[i].status_pertandingan === '1' ? 'fa-flag-checkered' : 'fa-check') +
						"'></i></button>" +
						"</td>" +
						"</tr>";
				}
				$("#getData").html(html);
			},
		});
	}

	function updateStatus(id_match) {
		Swal.fire({
			title: "Apakah kamu yakin menyelesaikan pertandingan?",
			text: "Jika pertandingan selesai, kamu tidak dapat memberi penilaian lagi!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, finish it!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "selesaipertandingan",
					data: {
						id: id_match
					},
					success: function () {
						window.location.reload();

					},

					error: function (error) {
						console.error("gagal");
					}
				});
			}
		});
	}

	function openNewWindows(id, ronde) {
		$.ajax({
			type: "POST",
			url: "tambahrondecondewan",
			data: {
				ronde_id: ronde,
				partai_id: id
			},
			success: function () {
				let url = "penjuriandewan" + "?id=" + id + "&ronde-id=" + ronde; // Ganti dengan URL yang sesuai

				let newTab = window.location.href = url;
				newTab.focus();
			},
		});
	}
});
