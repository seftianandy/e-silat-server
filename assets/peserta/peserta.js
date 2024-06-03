$(document).ready(function () {
	getData();

	let table = $('#data').DataTable({
		responsive: true
	});
	new $.fn.dataTable.FixedHeader(table);

	$("#tambahData").on("click", function () {
		tambahData();
	});

	$("#resetData").on("click", function () {
		resetData();
	});

	function getData() {
		$.ajax({
			type: "GET",
			url: "datapeserta",
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
						"</td>" +
						"<td>" +
						data[i].kontingen +
						"</td>" +
						"<td>" +
						data[i].kelas +
						"</td>" +
						"<td>" +
						data[i].kategori +
						"</td>" +
						"<td>" +
						data[i].jk +
						"</td>" +
						"<td class='text-center' style='vertical-align: middle;'>" ;
					if (data[i].tim == 'merah') {
						html += 
							"<span class='text-danger'>"+
							data[i].tim +
							"</span>";
					} else {
						html +=
							"<span class='text-primary'>" +
							data[i].tim +
							"</span>";
					}
					html +=
						"</td>" +
						"</tr>";
				}
				$("#getData").html(html);
			},
		});
	}

	function tambahData() {

		var formData = new FormData();
		formData.append('file', $('#file')[0].files[0]);

		$.ajax({
			type: "POST",
			url: "tambahpeserta",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "json", 
			success: function (response) {
				// console.log(response);
				getData();
				$("#modal-peserta").modal("hide");
				Swal.fire({
					position: "center",
					icon: "success",
					title: "Data berhasil ditambahkan !" ,// Ubah pesan sukses sesuai respons dari server
					showConfirmButton: false,
					timer: 2000,
				});
			},
			error: function (xhr, status, error) {
				Swal.fire({
					position: "center",
					icon: "error",
					title: "Error: " + xhr.responseText,
					showConfirmButton: false,
					timer: 2000,
				});
			}
		});
	}

	function resetData() {
		Swal.fire({
			title: "Apakah kamu yakin ?",
			text: "Semua data peserta dan pertandingan akan hilang!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "resetpeserta",
					success: function () {
						getData();
						Swal.fire({
							position: "center",
							icon: "success",
							title: "Data berhasil direset !",// Ubah pesan sukses sesuai respons dari server
							showConfirmButton: false,
							timer: 2000,
						});
					},
				});
				return false;
			}
		});
	}
});
