$(document).ready(function () {
	getData();
	setInterval(function () {
		getDataVote();
		getDataRondecon()
	}, 1000);
	// console.log(id);
	// console.log(rondeId);
	

	$(document).on("click", "#pukulan_m", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 1;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
		// Menonaktifkan tombol saat diklik
		$(this).prop("disabled", true);

		// Mengaktifkan kembali tombol setelah 2 detik
		setTimeout(function () {
			$("#pukulan_m").prop("disabled", false);
		}, 2000);
	});

	$(document).on("click", "#pukulan_b", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 1;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
		// Menonaktifkan tombol saat diklik
		$(this).prop("disabled", true);

		// Mengaktifkan kembali tombol setelah 2 detik
		setTimeout(function () {
			$("#pukulan_b").prop("disabled", false);
		}, 2000);
	});

	$(document).on("click", "#tendangan_m", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 2;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
		// Menonaktifkan tombol saat diklik
		$(this).prop("disabled", true);

		// Mengaktifkan kembali tombol setelah 2 detik
		setTimeout(function () {
			$("#tendangan_m").prop("disabled", false);
		}, 2000);
	});

	$(document).on("click", "#tendangan_b", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 2;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
		// Menonaktifkan tombol saat diklik
		$(this).prop("disabled", true);

		// Mengaktifkan kembali tombol setelah 2 detik
		setTimeout(function () {
			$("#tendangan_b").prop("disabled", false);
		}, 2000);
	});

	$(document).on("click", "#hapus_m", function () {
		let atlitId = $(this).attr("atlitId");
		hapusNilai(atlitId);
	});

	$(document).on("click", "#hapus_b", function () {
		let atlitId = $(this).attr("atlitId");
		hapusNilai(atlitId);
	});
	
	$(document).on("click", "#vote_ym", function () {
		let voteId = $(this).attr("voteId");
		let dataM = $(this).attr("dataM");
		let val = 'y';
		updateVote(voteId, val, dataM);
	});

	$(document).on("click", "#vote_nm", function () {
		let voteId = $(this).attr("voteId");
		let dataM = $(this).attr("dataM");
		let val = 'n';
		updateVote(voteId, val, dataM);
	});

	$(document).on("click", "#vote_yb", function () {
		let voteId = $(this).attr("voteId");
		let dataM = $(this).attr("dataM");
		let val = 'y';
		updateVote(voteId, val, dataM);
	});

	$(document).on("click", "#vote_nb", function () {
		let voteId = $(this).attr("voteId");
		let dataM = $(this).attr("dataM");
		let val = 'n';
		updateVote(voteId, val, dataM);
	});

	$(document).on("click", "#vote_kosong", function () {
		let voteId = $(this).attr("voteId");
		let dataM = $(this).attr("dataM");
		let val = 'kosong';
		updateVote(voteId, val, dataM);
	});

	$(document).on("click", "#ronde_btn", function () {
		let rondeId = $(this).attr("ronde-id");
		let partaiId = $(this).attr("partai-id");
		// console.log(rondeId)

		let newUrl = window.location.href.split('?')[0] + '?id=' + partaiId + '&ronde-id=' + rondeId;
		window.history.pushState({ path: newUrl }, '', newUrl);

		getData();
	});

	$(document).on("click", "#refresh", function () {
		getData()
	});

	function getData() {
		let queryString = window.location.search;
		let urlParams = new URLSearchParams(queryString);

		let id = urlParams.get('id')
		let rondeId = urlParams.get('ronde-id')

		$.ajax({
			type: "POST",
			url: "datanilaijuri",
			data: {
				partai_id : id,
				ronde_id : rondeId
			},
			async: false,
			dataType: "json",
			success: function (data) {
				var i;
				for (i = 0; i < data.length; i++) {
					$("#arena").text(data[i].arena);
					$("#pertandingan").text(data[i].pertandingan);
					$("#kontingen_merah").text(data[i].kontingen_merah);
					$("#nama_atlit_merah").text(data[i].nama_atlit_merah);
					$("#kontingen_biru").text(data[i].kontingen_biru);
					$("#nama_atlit_biru").text(data[i].nama_atlit_biru);

					if (data[i].status_pertandingan === '1') {
						$("#pukulan_m").attr("atlitId", data[i].tim_merah_id).hide();
						$("#tendangan_m").attr("atlitId", data[i].tim_merah_id).hide();
						$("#hapus_m").attr("atlitId", data[i].tim_merah_id).hide();

						$("#pukulan_b").attr("atlitId", data[i].tim_biru_id).hide();
						$("#tendangan_b").attr("atlitId", data[i].tim_biru_id).hide();
						$("#hapus_b").attr("atlitId", data[i].tim_biru_id).hide();

						$("#refresh").hide();
					} else {
						$("#pukulan_m").attr("atlitId", data[i].tim_merah_id);
						$("#tendangan_m").attr("atlitId", data[i].tim_merah_id);
						$("#hapus_m").attr("atlitId", data[i].tim_merah_id);

						$("#pukulan_b").attr("atlitId", data[i].tim_biru_id);
						$("#tendangan_b").attr("atlitId", data[i].tim_biru_id);
						$("#hapus_b").attr("atlitId", data[i].tim_biru_id);
					}

					var tim_merah_id = data[i].tim_merah_id;
					var tim_biru_id = data[i].tim_biru_id;
					// setInterval(function () {
					// 	getRonde(id, rondeId, tim_merah_id, tim_biru_id);
					// }, 5000);

					getRonde(id, rondeId, tim_merah_id, tim_biru_id);

					if (data[i].status_ronde == "nonaktif") {
						$("#tombol").hide();
					} else {
						$("#tombol").show();
					}
				}
			},
		});
	}

	function getRonde(partai_id, ronde_id, tim_merah_id, tim_biru_id) {
		$.ajax({
			type: "POST",
			url: "datarondejuri",
			data: {
				partai_id: partai_id
			},
			dataType: "json",
			success: function (data) {
				let html = "";
				let i;
				for (i = 0; i < data.length; i++) {
					html +=
						"<tr ronde-id='"+
						data[i].ronde_id +
						"'>" +
						"<td class='text-danger'>" +
						"<span id='nilai_merah_"+
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-center ";
					if (ronde_id == data[i].ronde_id){
						html +=	"bg-navy";
					}
					html +=	
						"' id='ronde_btn' partai-id='" +
						partai_id +
						"' ronde-id='" +
						data[i].ronde_id +
						"' style='cursor: pointer;'>" +
						"<strong>" +
						"<span id='ronde'>" +
						data[i].ronde +
						"</span>" +
						"</strong>" +
						"</td>" +
						"<td class='text-danger text-right'>" +
						"<span id='nilai_biru_"+
						i +
						"'></span>" +
						"</td>" +
						"</tr>";

					getNilaiMerah(i, data[i].ronde_id, tim_merah_id);
					getNilaiBiru(i, data[i].ronde_id, tim_biru_id);
				}
				$("#loadRonde").html(html);
			},
		});
	}

	function getNilaiMerah(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaiatlitjuri",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#nilai_merah_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					console.log(i)
				}
			},
		});
	}

	function getNilaiBiru(index, ronde_id, atlit_id) {
		$.ajax({
			type: "POST",
			url: "datanilaiatlitjuri",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#nilai_biru_" + index).text(data[i].nilai);
					console.log(data[i].nilai)
					console.log(i)
				}
			},
		});
	}

	function tambahNilai(rondeId, atlitId, nilaiId, tombol) {
		$.ajax({
			type: "POST",
			url: "tambahnilai",
			data: {
				ronde_id: rondeId,
				atlit_id: atlitId,
				nilai_id: nilaiId
			},
			success: function () {
				updateTombol(tombol);
				getData();
			},
		});
	}

	function getDataRondecon() {
		$.ajax({
			type: "GET",
			url: "datarondeconjuri",
			async: false,
			dataType: "json",
			success: function (data) {
				var html = "";
				var i;
				for (i = 0; i < data.length; i++) {
					if (data[i].id != null) {
						$("#title_ronde").text();

						$("#modal-ronde").modal("show");

						var rondeId = data[i].ronde_id;
						var partaiId = data[i].partai_id;
						var id = data[i].id;

						var waktu = 5;
						setInterval(function () {
							waktu--;
							if (waktu < 0) {
								$("#modal-ronde").modal("hide");
								updateRondecon(id, rondeId, 'y');

								let newUrl = window.location.href.split('?')[0] + '?id=' + partaiId + '&ronde-id=' + rondeId;
								window.history.pushState({ path: newUrl }, '', newUrl);
								location.reload();

							} else {
								document.getElementById("title_ronde").innerHTML = waktu;
							}
						}, 1000);
					}
				}
			},
		});
	}

	function updateRondecon(id, rondeId, val) {
		$.ajax({
			type: "POST",
			url: "updaterondeconjuri",
			data: {
				id: id,
				rondeId : rondeId,
				val: val
			},
			success: function () {
				console.log("berhasil pindah ronde");
			},
		});
	}

	function getDataVote() {
		$.ajax({
			type: "GET",
			url: "datavotejuri",
			async: false,
			dataType: "json",
			success: function (data) {
				var html = "";
				var i;
				for (i = 0; i < data.length; i++) {
					if (data[i].id != null){
						if (data[i].nilai_id == 3) {
							var vote = "Jatuhan";
						} else {
							var vote = "Pelanggaran";
						}

						if (data[i].sudut == "modal-merah"){
							$("#title_merah").text(vote);
						} else {
							$("#title_biru").text(vote);
						}
						$("#vote_yb").attr("voteId", data[i].id);
						$("#vote_ym").attr("voteId", data[i].id);
						$("#vote_nb").attr("voteId", data[i].id);
						$("#vote_nm").attr("voteId", data[i].id);
						$("#vote_kosong").attr("voteId", data[i].id);

						$("#vote_yb").attr("dataM", data[i].sudut);
						$("#vote_ym").attr("dataM", data[i].sudut);
						$("#vote_nb").attr("dataM", data[i].sudut);
						$("#vote_nm").attr("dataM", data[i].sudut);
						$("#vote_kosong").attr("dataM", data[i].sudut);

						
						$("#" + data[i].sudut).modal("show");

						var sudut = data[i].sudut;
						var id = data[i].id;

						if(data[i].nilai_id == 3){
							setTimeout(function () {
								$("#" + sudut).modal("hide");
								updateVote(id, 'n', sudut);
							}, 50000); 
						}
					}
				}
			},
		});
	}

	function updateVote(voteId, val, dataM) {
		$.ajax({
			type: "POST",
			url: "updatevotejuri",
			data: {
				id: voteId,
				val: val
			},
			success: function () {
				$("#" + dataM).modal("hide");
			},
		});
	}

	function hapusNilai(atlitId) {
		Swal.fire({
			title: "Yakin hapus nilai ?",
			text: "nilai terakhir yang masuk akan dihapus",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#018C4B",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "hapusnilai",
					data: {
						atlit_id: atlitId
					},
					success: function () {
						getData();
						Swal.fire({
							position: "center",
							icon: "success",
							title: "Berhasil dihapus !",// Ubah pesan sukses sesuai respons dari server
							showConfirmButton: false,
							timer: 2000,
						});
					},
				});
				return false;
			}
		});
	}

	function updateTombol(tombol) {
		$.ajax({
			type: "POST",
			url: "updatetombol",
			data: {
				tombol: tombol,
				status: 'on'
			},
			success: function () {
				setTimeout(function () {
					$.ajax({
						type: "POST",
						url: "updatetombol",
						data: {
							tombol: tombol,
							status: 'off'
						},
						success: function () {
							console.log(tombol + ' off');
						},
					});
				}, 2000); 
			},
		});
	}
});
