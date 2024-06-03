$(document).ready(function () {
	getData();

	let table = $('#data').DataTable({
		responsive: true
	});
	new $.fn.dataTable.FixedHeader(table);

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
					var ronde_1 = data[i].ronde_id;
					var ronde_2 = parseInt(data[i].ronde_id) + 1; 
					var ronde_3 = parseInt(data[i].ronde_id) + 2; 
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
						"<a href='papanskor?id=" +
						data[i].id +
						"&ronde-id=1' target='_blank' class='btn btn-sm btn-warning'><i class='fa fa-desktop'></i></a>" +
						"</td>" +
						"</tr>";
				}
				$("#getData").html(html);
			},
		});
	}
});
