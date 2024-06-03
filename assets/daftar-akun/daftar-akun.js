$(document).ready(function () {
	getData();

	function getData() {
		$.ajax({
			type: "GET",
			url: "dataakun",
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
						data[i].nama +
						"<br><i> Username : " +
						data[i].username +
						"</i>" +
						"</td>" +
						"<td class='text-center' style='vertical-align: middle;'>" +
						"<button class='btn btn-sm btn-default btn-block' disabled>"+
						data[i].role +
						"</button>"+
						"</td>" +
						"</tr>";
				}
				$("#getData").html(html);
			},
		});
	}
});
