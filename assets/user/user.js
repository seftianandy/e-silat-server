$(document).ready(function () {
	getData();

	var table = $('#data_user').DataTable( {
        responsive: true
    } ); 
    new $.fn.dataTable.FixedHeader( table );
	// $("#data_user").DataTable();

	$("#tambah_user").on("submit", function (e) {
		e.preventDefault();
		var data = $("#tambah_user").serialize();
		tambahData(data);
	});

	$("#tambahUser").on("click", function () {
		var data = $("#tambah_user").serialize();
		data = data.replace(/&?[^=&]+=(&|$)/g, "");
		tambahData(data);
	});

	$(document).on("click", "#editUser", function () {
		var data = $(this).attr("data-id");
		editData(data);
	});

	$(document).on("submit", "#edit_user", function (e) {
		e.preventDefault();
		var data = $("#edit_user").serialize();
		saveEditData(data);
	});

	$(document).on("click", "#simpanEditUser", function () {
		var data = $("#edit_user").serialize();
		data = data.replace(/&?[^=&]+=(&|$)/g, "");
		saveEditData(data);
	});

	$(document).on("click", "#deleteUser", function () {
		var data = $(this).attr("data-id");
		deleteData(data);
	});

	function getData() {
		$.ajax({
			type: "ajax",
			url: "datauser",
			async: false,
			dataType: "json",
			success: function (data) {
				var html = "";
				var i;
				for (i = 0; i < data.length; i++) {
					html +=
						"<tr id='siswa" +
						data[i].id_user +
						"'>" +
						"<td style='display: inline-block;vertical-align: middle;float: none;' class='text-center'>" +
						data[i].username +
						"</td>" +
						"<td>" +
						"NIP : " +
						data[i].nip +
						"<br>" +
						"Nama Lengkap : " +
						data[i].nama +
						"<br>" +
						"Jenis Kelamin : " +
						data[i].jk +
						"<br>" +
						"</td>" +
						"<td>" +
						"No. HP : " +
						data[i].no_hp +
						"<br>" +
						"Email : " +
						data[i].email +
						"<br>" +
						"</td>" +
						"<td class='text-center'>" +
						"<button type='button' id='editUser'" +
						"data-id='" +
						data[i].id_user +
						"'" +
						"class='btn btn-sm btn-default'>" +
						"EDIT" +
						"</button> " +
						"<button type='button' id='deleteUser'" +
						"data-id='" +
						data[i].id_user +
						"'" +
						"class='btn btn-sm btn-danger'>" +
						"HAPUS" +
						"</button>" +
						"</td>" +
						"</tr>";
				}
				$("#getDataUser").html(html);
			},
		});
	}

	function tambahData(data) {
		$.ajax({
			type: "POST",
			url: "tambahuser",
			data: data,
			success: function () {
				getData();
				$("#modal-user").modal("hide");
				Swal.fire({
					position: "center",
					icon: "success",
					title: "Your data has been saved",
					showConfirmButton: false,
					timer: 2000,
				});
				$("#nip").val("");
				$("#nama").val("");
				$("#jk").val("");
				$("#no-hp").val("");
			},
		});
	}

	function editData(data) {
		$.ajax({
			type: "post",
			url: "dataedituser",
			data: { id: data },
			async: false,
			dataType: "json",
			success: function (data) {
				var i;
				for (i = 0; i < data.length; i++) {
					$("#edit-id-user").val(data[i].id_user);
					$("#edit-nip").val(data[i].nip);
					$("#edit-nama").val(data[i].nama);
					$("select#edit-jk").val(data[i].jk);
					$("#edit-no-hp").val(data[i].no_hp);
					$("#edit-email").val(data[i].email);
				}
				$("#modal-edit-user").modal("show");
			},
		});
	}

	function saveEditData(data) {
		$.ajax({
			type: "POST",
			url: "simpanedituser",
			data: data,
			success: function () {
				getData();
				$("#modal-edit-user").modal("hide");
				Swal.fire({
					position: "center",
					icon: "success",
					title: "Your data has been edited",
					showConfirmButton: false,
					timer: 2000,
				});
			},
		});
	}

	function deleteData(data) {
		Swal.fire({
			title: "Are you sure?",
			text: "Data will be deleted!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "deleteuser",
					data: { id: data },
					success: function () {
						getData();
					},
				});
				return false;
			}
		});
	}
});
