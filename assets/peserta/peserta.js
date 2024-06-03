$(document).ready(function () {
	getData();
	$('#data').DataTable();
	// new $.fn.dataTable.FixedHeader(table);

	$("#tambahData").on("click", function () {
		tambahData();
	});

	$(document).on("click", "#saveLogo", function () {
		dataId = $(this).attr("data-id");
		updateLogo(dataId);
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
						"<td class='text-center' style='font-weight: bold; font-size: 1.7rem;'>" +
						num++ +
						"</td>" +
						"<td>" +
						"<span style='font-weight: bold;'>Nama : </span>" + data[i].nama + "<br>" +
						"<span style='font-weight: bold;'>Kontingen : </span>" + data[i].kontingen + "<br>" +
						"<span style='font-weight: bold;'>Kelas : </span>" + data[i].kelas + "<br>" +
						"<span style='font-weight: bold;'>Kategori : </span>" + data[i].kategori + "<br>" +
						"<span style='font-weight: bold;'>Jenis Kelamin : </span>" + data[i].jk + "<br>" +
						"<span style='font-weight: bold;'>Kubu : </span> <br> <button class='btn btn-md btn-";
						if (data[i].tim == 'merah') {
							html +=
								"danger";
						} else {
							html +=
								"primary";
						}
					html +=
						"'>";
						if (data[i].tim == 'merah') {
							html +=
								"&nbsp &nbsp Merah &nbsp &nbsp";
						} else {
							html +=
								"&nbsp &nbsp &nbsp Biru &nbsp &nbsp &nbsp";
						}
					html +=
					// 	"</button><br>" +
					// 	"<td>" +
					// 	"<div class='input-group margin'>" +
					// 	"<input type='file' name='logo' id='uploadLogo" + data[i].id +"' class='form-control'>" +
					// 	"<span class='input-group-btn'>" +
					// 	"<button type='button' class='btn btn-success btn-flat' id='saveLogo' data-id='" + data[i].id+"'> <i class='fa fa-save'></i> </button>" +
					// 	"</span>" +
					// 	"</div> <br> <br>";
					// 	if (data[i].logo == null || data[i].logo == '') {
					// 		html +=
					// 			"<image src='dist/img/noimage.png' class='img-responsive'>";
					// 	} else {
					// 		html +=
					// 			"<image src='data:image/jpeg;base64," + data[i].logo +"' class='img-responsive' style='max-height: 10rem;'>";
					// 	}
					// html +=
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

	function updateLogo(dataId) {

		var id = dataId;
		// var pic = $('#uploadLogo' + dataId).prop('files')[0];
		// console.log(dataId)
		// console.log(value);
		var formData = new FormData();
		formData.append('file', $('#uploadLogo' + dataId)[0].files[0]);
		formData.append('id', id);


		$.ajax({
			type: "POST",
			url: "updatelogo",
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
