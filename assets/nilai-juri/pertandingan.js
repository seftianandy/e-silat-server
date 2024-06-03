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
						"<button class='btn btn-sm btn-warning' id='penjurian' data-id='" +
						data[i].id +
						"' ronde-id='"+
						data[i].ronde_id +
						"'><i class='fa fa-desktop'></i></button>"+
						"</td>" +
						"</tr>";
				}
				$("#getData").html(html);
			},
		});
	}

	function openNewWindows(id, ronde) {
		let url = "penjurian" + "?id=" + id + "&ronde-id=" + ronde; // Ganti dengan URL yang sesuai

		let newTab = window.open(url, "_blank");
		newTab.focus();
	}
});
