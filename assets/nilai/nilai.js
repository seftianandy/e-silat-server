$(document).ready(function () {
	getData();

	function getData() {
		$.ajax({
			type: "GET",
			url: "datanilai",
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
						"<td>" +
						data[i].jenis +
						"</td>" +
						"<td class='text-center' style='vertical-align: middle;'>" +
						"<button class='btn btn-sm btn-default btn-block' disabled><strong>"+
						data[i].nilai_hitung +
						"</strong></button>"+
						"</td>" +
						"</tr>";
				}
				$("#getData").html(html);
			},
		});
	}
});
