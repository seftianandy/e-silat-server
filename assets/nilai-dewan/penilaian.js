$(document).ready(function () {
	getData();
	// console.log(id);
	// console.log(rondeId);


	$(document).on("click", "#jatuhan_m", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 3;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#jatuhan_b", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 3;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#binaan_m", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 6;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#binaan_b", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 6;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#teguran_m", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 5;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#teguran_b", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 5;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#teguran2_m", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 7;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#teguran2_b", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 7;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#peringatan_m", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 4;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#peringatan_b", function () {
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 4;

		let tombol = $(this).attr("tombol");
		tambahNilai(rondeId, atlitId, nilaiId, tombol);
	});

	$(document).on("click", "#vote_jm", function () {
		let modal = "modal-merah";
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 3;
		tambahVote(nilaiId, modal, atlitId, rondeId);
	});

	$(document).on("click", "#vote_jb", function () {
		let modal = "modal-biru";
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 3;
		tambahVote(nilaiId, modal, atlitId, rondeId);
	});

	$(document).on("click", "#vote_bm", function () {
		let modal = "modal-merah";
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 6;
		tambahVote(nilaiId, modal, atlitId, rondeId);
	});

	$(document).on("click", "#vote_bb", function () {
		let modal = "modal-biru";
		let newQueryString = new URLSearchParams(window.location.search);
		let rondeId = newQueryString.get('ronde-id');
		let atlitId = $(this).attr("atlitId");
		let nilaiId = 6;
		tambahVote(nilaiId, modal, atlitId, rondeId);
	});

	$(document).on("click", "#hapus_m", function () {
		let atlitId = $(this).attr("atlitId");
		hapusNilai(atlitId);
	});

	$(document).on("click", "#hapus_b", function () {
		let atlitId = $(this).attr("atlitId");
		hapusNilai(atlitId);
	});

	$(document).on("click", "#ronde_btn", function () {
		let rondeId = $(this).attr("ronde-id");
		let partaiId = $(this).attr("partai-id");
		// console.log(rondeId)

		$.ajax({
			type: "POST",
			url: "tambahrondecondewan",
			data: {
				ronde_id: rondeId,
				partai_id: partaiId
			},
			success: function () {
				let newUrl = window.location.href.split('?')[0] + '?id=' + partaiId + '&ronde-id=' + rondeId;
				window.history.pushState({ path: newUrl }, '', newUrl);

				getData();
			},
		});
	});

	function getData() {
		let queryString = window.location.search;
		let urlParams = new URLSearchParams(queryString);

		let id = urlParams.get('id')
		let rondeId = urlParams.get('ronde-id')

		$.ajax({
			type: "POST",
			url: "datanilaidewan",
			data: {
				partai_id: id,
				ronde_id: rondeId
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
						$("#jatuhan_m").attr("atlitId", data[i].tim_merah_id).hide();
						$("#binaan_m").attr("atlitId", data[i].tim_merah_id).hide();
						$("#teguran_m").attr("atlitId", data[i].tim_merah_id).hide();
						$("#teguran2_m").attr("atlitId", data[i].tim_merah_id).hide();
						$("#peringatan_m").attr("atlitId", data[i].tim_merah_id).hide();
						$("#hapus_m").attr("atlitId", data[i].tim_merah_id).hide();

						$("#jatuhan_b").attr("atlitId", data[i].tim_biru_id).hide();
						$("#binaan_b").attr("atlitId", data[i].tim_biru_id).hide();
						$("#teguran_b").attr("atlitId", data[i].tim_biru_id).hide();
						$("#teguran2_b").attr("atlitId", data[i].tim_biru_id).hide();
						$("#peringatan_b").attr("atlitId", data[i].tim_biru_id).hide();
						$("#hapus_b").attr("atlitId", data[i].tim_biru_id).hide();

						$("#vote_jm").attr("atlitId", data[i].tim_merah_id).hide();
						$("#vote_jb").attr("atlitId", data[i].tim_biru_id).hide();
						$("#vote_bm").attr("atlitId", data[i].tim_merah_id).hide();
						$("#vote_bb").attr("atlitId", data[i].tim_biru_id).hide();

						$("#voteBtn").hide();
					} else {
						$("#jatuhan_m").attr("atlitId", data[i].tim_merah_id);
						$("#binaan_m").attr("atlitId", data[i].tim_merah_id);
						$("#teguran_m").attr("atlitId", data[i].tim_merah_id);
						$("#teguran2_m").attr("atlitId", data[i].tim_merah_id);
						$("#peringatan_m").attr("atlitId", data[i].tim_merah_id);
						$("#hapus_m").attr("atlitId", data[i].tim_merah_id);

						$("#jatuhan_b").attr("atlitId", data[i].tim_biru_id);
						$("#binaan_b").attr("atlitId", data[i].tim_biru_id);
						$("#teguran_b").attr("atlitId", data[i].tim_biru_id);
						$("#teguran2_b").attr("atlitId", data[i].tim_biru_id);
						$("#peringatan_b").attr("atlitId", data[i].tim_biru_id);
						$("#hapus_b").attr("atlitId", data[i].tim_biru_id);

						$("#vote_jm").attr("atlitId", data[i].tim_merah_id);
						$("#vote_jb").attr("atlitId", data[i].tim_biru_id);
						$("#vote_bm").attr("atlitId", data[i].tim_merah_id);
						$("#vote_bb").attr("atlitId", data[i].tim_biru_id);
					}

					getRonde(id, rondeId, data[i].tim_merah_id, data[i].tim_biru_id);

					chekTeguranMerahButton(rondeId, data[i].tim_merah_id);
					chekTeguranBiruButton(rondeId, data[i].tim_biru_id);


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
			url: "datarondedewan",
			data: {
				partai_id: partai_id
			},
			dataType: "json",
			success: function (data) {
				let html = "";
				let i;
				for (i = 0; i < data.length; i++) {
					html +=
						"<tr ronde-id='" +
						data[i].ronde_id +
						"'>" +
						"<td class='text-danger bg-warning text-center'>" +
						"<span id='peringatan_merah_" +
						i +
						"' peringatan-merah-" +
						i +
						"=''></span>" +
						"</td>" +
						"<td class='text-danger text-center'>" +
						"<span id='teguran_merah_" +
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-danger text-center'>" +
						"<span id='binaan_merah_" +
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-danger text-center'>" +
						"<span id='hukuman_merah_" +
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-danger'>" +
						"<span id='jatuhan_merah_" +
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-center ";
					if (ronde_id == data[i].ronde_id) {
						html += "bg-navy";
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
						"<span id='jatuhan_biru_" +
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-danger text-center'>" +
						"<span id='hukuman_biru_" +
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-danger text-center'>" +
						"<span id='binaan_biru_" +
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-danger text-center'>" +
						"<span id='teguran_biru_" +
						i +
						"'></span>" +
						"</td>" +
						"<td class='text-danger bg-warning text-center'>" +
						"<span id='peringatan_biru_" +
						i +
						"' peringatan-merah-" +
						i +
						"=''></span>" +
						"</td>" +
						"</tr>";


					getPeringatanMerah(i, data[i].ronde_id, tim_merah_id);
					getTeguranMerah(i, data[i].ronde_id, tim_merah_id);
					getBinaanMerah(i, data[i].ronde_id, tim_merah_id);
					getHukumanMerah(i, data[i].ronde_id, tim_merah_id);
					getJatuhanMerah(i, data[i].ronde_id, tim_merah_id);

					getPeringatanBiru(i, data[i].ronde_id, tim_biru_id);
					getTeguranBiru(i, data[i].ronde_id, tim_biru_id);
					getBinaanBiru(i, data[i].ronde_id, tim_biru_id);
					getHukumanBiru(i, data[i].ronde_id, tim_biru_id);
					getJatuhanBiru(i, data[i].ronde_id, tim_biru_id);
				}
				$("#loadRonde").html(html);
			},
		});
	}

	function getPeringatanMerah(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaiperingatandewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 4
			},
			dataType: "json",
			success: function (data) {
				for (i = 0; i < data.length; i++) {
					// console.log("merah "+index)
					nilai = parseInt(data[i].nilai);
					nilai_i = nilai / 5;
					if (nilai_i == 1) {
						nilaiPeringatan = nilai;
						// console.log("nilai 1 = " + nilai);
					} else if (nilai_i == 2) {
						nilaiPeringatan = nilai + 5;
						// console.log("nilai 2 = " + nilaiPeringatan)
					} else if (nilai_i == 3) {
						nilaiPeringatan = nilai + 15;
						$("#peringatan_m").prop("disabled", true);
						// console.log("nilai 3 = " + nilaiPeringatan)
					} else {
						console.log("nilai diskualifikasi = " + 0);
					}

					if (index == 0) {
						$("#per_m1").val(nilaiPeringatan);
						$("#peringatan_merah_" + index).text("-" + nilaiPeringatan);
					}
					if (index == 1) {
						nilaiM2 = $("#per_m1").val();
						nilaiM2_i = parseInt(nilaiM2);
						if (nilaiM2_i == 0) {
							$("#per_m2").val(nilaiPeringatan);
							$("#peringatan_merah_" + index).text("-" + nilaiPeringatan);
						} else {
							sumVarM2 = nilaiM2_i + nilaiPeringatan;
							cek_nilai1 = sumVarM2 / 5;

							if (cek_nilai1 == 1) {
								nilaiM2_oke = sumVarM2;
							} else if (cek_nilai1 == 2) {
								nilaiM2_oke = sumVarM2 + 5;
							} else if (cek_nilai1 == 3) {
								nilaiM2_oke = sumVarM2 + 15;
							} else if (cek_nilai1 == 4) {
								nilaiM2_oke = sumVarM2 + 10;
								$("#peringatan_m").prop("disabled", true);
							}

							$("#per_m2").val(nilaiM2_oke);

							$("#peringatan_merah_" + index).text("-" + nilaiM2_oke);
						}

						// console.log("ronde 2 = " + nilaiM2);
					}
					if (index == 2) {
						nilaiM1 = $("#per_m1").val();
						nilaiM2 = $("#per_m2").val();
						nilaiM3 = $("#per_m3").val();

						if (nilaiM1 == 0 && nilaiM2 == 0) {
							$("#per_m3").val(nilaiPeringatan);
							$("#peringatan_merah_" + index).text("-" + nilaiPeringatan);
						} else if (nilaiM2 != 0) {
							nilai = parseInt(nilaiM2);

							sumVarM2 = nilai + nilaiPeringatan;
							cek_nilai1 = sumVarM2 / 5;

							if (cek_nilai1 == 1) {
								nilaiM2_oke = sumVarM2;
							} else if (cek_nilai1 == 2) {
								nilaiM2_oke = sumVarM2 + 5;
							} else if (cek_nilai1 == 3) {
								nilaiM2_oke = sumVarM2 + 15;
							} else if (cek_nilai1 == 4) {
								nilaiM2_oke = sumVarM2 + 10;
								$("#peringatan_m").prop("disabled", true);
							}

							$("#per_m3").val(nilaiM2_oke);

							$("#peringatan_merah_" + index).text("-" + nilaiM2_oke);
						} else if (nilaiM1 != 0) {
							nilai = parseInt(nilaiM1);

							sumVarM2 = nilai + nilaiPeringatan;
							cek_nilai1 = sumVarM2 / 5;

							if (cek_nilai1 == 1) {
								nilaiM2_oke = sumVarM2;
							} else if (cek_nilai1 == 2) {
								nilaiM2_oke = sumVarM2 + 5;
							} else if (cek_nilai1 == 3) {
								nilaiM2_oke = sumVarM2 + 15;
							} else if (cek_nilai1 == 4) {
								nilaiM2_oke = sumVarM2 + 10;
								$("#peringatan_m").prop("disabled", true);
							}

							$("#per_m3").val(nilaiM2_oke);

							$("#peringatan_merah_" + index).text("-" + nilaiM2_oke);
						}
					}
				}
			},
		});
	}

	function getPeringatanBiru(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaiperingatandewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 4
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					// console.log("merah "+index)
					nilai = parseInt(data[i].nilai);
					nilai_i = nilai / 5;
					if (nilai_i == 1) {
						nilaiPeringatan = nilai;
						// console.log("nilai 1 = " + nilai);
					} else if (nilai_i == 2) {
						nilaiPeringatan = nilai + 5;
						// console.log("nilai 2 = " + nilaiPeringatan)
					} else if (nilai_i == 3) {
						nilaiPeringatan = nilai + 15;
						$("#peringatan_b").prop("disabled", true);
						// console.log("nilai 3 = " + nilaiPeringatan)
					} else {
						console.log("nilai diskualifikasi = " + 0);
					}

					if (index == 0) {
						$("#per_b1").val(nilaiPeringatan);
						$("#peringatan_biru_" + index).text("-" + nilaiPeringatan);
					}
					if (index == 1) {
						nilaiB2 = $("#per_b1").val();
						nilaiB2_i = parseInt(nilaiB2);
						if (nilaiB2_i == 0) {
							$("#per_b2").val(nilaiPeringatan);
							$("#peringatan_biru_" + index).text("-" + nilaiPeringatan);
						} else {
							sumVarB2 = nilaiB2_i + nilaiPeringatan;
							cek_nilai = sumVarB2 / 5;

							if (cek_nilai == 1) {
								nilaiB2_oke = sumVarB2;
							} else if (cek_nilai == 2) {
								nilaiB2_oke = sumVarB2 + 5;
							} else if (cek_nilai == 3) {
								nilaiB2_oke = sumVarB2 + 15;
							} else if (cek_nilai == 4) {
								nilaiB2_oke = sumVarB2 + 10;
								$("#peringatan_b").prop("disabled", true);
							}

							$("#per_b2").val(nilaiB2_oke);

							$("#peringatan_biru_" + index).text("-" + nilaiB2_oke);
						}

						// console.log("ronde 2 = " + nilaiB2);
					}
					if (index == 2) {
						nilaiB1 = $("#per_b1").val();
						nilaiB2 = $("#per_b2").val();
						nilaiB3 = $("#per_b3").val();

						if (nilaiB1 == 0 && nilaiB2 == 0) {
							$("#per_b3").val(nilaiPeringatan);
							$("#peringatan_biru_" + index).text("-" + nilaiPeringatan);
						} else if (nilaiB2 != 0) {
							nilai = parseInt(nilaiB2);

							sumVarB2 = nilai + nilaiPeringatan;
							cek_nilai = sumVarB2 / 5;

							if (cek_nilai == 1) {
								nilaiB2_oke = sumVarB2;
							} else if (cek_nilai == 2) {
								nilaiB2_oke = sumVarB2 + 5;
							} else if (cek_nilai == 3) {
								nilaiB2_oke = sumVarB2 + 15;
							} else if (cek_nilai == 4) {
								nilaiB2_oke = sumVarB2 + 10;
								$("#peringatan_b").prop("disabled", true);
							}

							$("#per_b3").val(nilaiB2_oke);

							$("#peringatan_biru_" + index).text("-" + nilaiB2_oke);
						} else if (nilaiB1 != 0) {
							nilai = parseInt(nilaiB1);

							sumVarB2 = nilai + nilaiPeringatan;
							cek_nilai = sumVarB2 / 5;

							if (cek_nilai == 1) {
								nilaiB2_oke = sumVarB2;
							} else if (cek_nilai == 2) {
								nilaiB2_oke = sumVarB2 + 5;
							} else if (cek_nilai == 3) {
								nilaiB2_oke = sumVarB2 + 15;
							} else if (cek_nilai == 4) {
								nilaiB2_oke = sumVarB2 + 10;
								$("#peringatan_b").prop("disabled", true);
							}

							$("#per_b3").val(nilaiB2_oke);

							$("#peringatan_biru_" + index).text("-" + nilaiB2_oke);
						}
					}
				}
			},
		});
	}

	function getTeguranMerah(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaitegurandewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 5,
				nilai2_id: 7,
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#teguran_merah_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					// console.log(i)
				}
			},
		});
	}

	function chekTeguranMerahButton(ronde_id, atlit_id) {
		$.ajax({
			type: "POST",
			url: "datateguranskor",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id
			},
			dataType: "json",
			success: function (data) {
				let i;
				if (data.length <= 0) {
					$("#teguran_m").prop("disabled", false);
					$("#teguran2_m").prop("disabled", false);
				} else {
					for (i = 0; i < data.length; i++) {
						let nilai = 0; // Inisialisasi nilai di luar perulangan
						if (data.length > 0) {
							nilai = data[0].nilai; // Ambil nilai hanya jika ada data
						}

						if (nilai == 1) {
							$("#teguran_m").prop("disabled", true);
						} else {
							$("#teguran_m").prop("disabled", false);
						}

						if (nilai == 2) {
							$("#teguran2_m").prop("disabled", true);
							$("#teguran_m").prop("disabled", false);
						} else {
							$("#teguran2_m").prop("disabled", false);
						}
					}
				}
			},
		});
	}

	function getTeguranBiru(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaitegurandewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 5,
				nilai2_id: 7,
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#teguran_biru_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					// console.log(i)
				}
			},
		});
	}

	function chekTeguranBiruButton(ronde_id, atlit_id) {
		$.ajax({
			type: "POST",
			url: "datateguranskor",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id
			},
			dataType: "json",
			success: function (data) {
				let i;
				if (data.length <= 0) {
					$("#teguran_b").prop("disabled", false);
					$("#teguran2_b").prop("disabled", false);
				} else {
					for (i = 0; i < data.length; i++) {
						let nilai = 0; // Inisialisasi nilai di luar perulangan
						if (data.length > 0) {
							nilai = data[0].nilai; // Ambil nilai hanya jika ada data
						}

						if (nilai == 1) {
							$("#teguran_b").prop("disabled", true);
						} else {
							$("#teguran_b").prop("disabled", false);
						}

						if (nilai == 2) {
							$("#teguran2_b").prop("disabled", true);
							$("#teguran_b").prop("disabled", false);
						} else {
							$("#teguran2_b").prop("disabled", false);
						}
					}
				}
			},
		});
	}

	function getBinaanMerah(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaiatlitdewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 6
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#binaan_merah_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					console.log(i)
				}
			},
		});
	}

	function getBinaanBiru(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaiatlitdewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 6
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#binaan_biru_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					console.log(i)
				}
			},
		});
	}

	function getBinaanMerah(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaiatlitdewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 6
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#binaan_merah_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					console.log(i)
				}
			},
		});
	}

	function getBinaanBiru(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaiatlitdewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 6
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#binaan_biru_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					console.log(i)
				}
			},
		});
	}

	function getJatuhanMerah(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaijatuhandewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 3
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#jatuhan_merah_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					console.log(i)
				}
			},
		});
	}

	function getJatuhanBiru(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaijatuhandewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_id: 3
			},
			dataType: "json",
			success: function (data) {
				let i;
				for (i = 0; i < data.length; i++) {
					$("#jatuhan_biru_" + index).text(data[i].nilai);
					// console.log(data[i].nilai)
					console.log(i)
				}
			},
		});
	}

	function getHukumanMerah(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaihukumandewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_t_id: 5,
				nilai_t2_id: 7,
				nilai_p_id: 4
			},
			dataType: "json",
			success: function (data) {
				let nilai = data.nilai; // Mengambil nilai dari properti 'nilai' dalam objek
				$("#hukuman_merah_" + index).text(nilai);
			},
		});
	}

	function getHukumanBiru(index, ronde_id, atlit_id) {
		// console.log(index)
		$.ajax({
			type: "POST",
			url: "datanilaihukumandewan",
			data: {
				ronde_id: ronde_id,
				atlit_id: atlit_id,
				nilai_t_id: 5,
				nilai_t2_id: 7,
				nilai_p_id: 4
			},
			dataType: "json",
			success: function (data) {
				let nilai = data.nilai; // Mengambil nilai dari properti 'nilai' dalam objek
				$("#hukuman_biru_" + index).text(nilai);
			},
		});
	}

	function tambahNilai(rondeId, atlitId, nilaiId, tombol) {
		$.ajax({
			type: "POST",
			url: "tambahnilaidewan",
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

	function tambahVote(nilaiId, modal, atlitId, rondeId) {
		$.ajax({
			type: "POST",
			url: "tambahvotedewan",
			data: {
				nilai_id: nilaiId,
				sudut: modal
			},
			success: function () {
				// updateTombol(tombol);
				// getData();
				$("#" + modal).modal("hide");
				let intervalId = setInterval(function () {
					getDataVote();
				}, 1000);
				$("#modal-vote").modal("show");
				// setTimeout(function () {
				// 	clearInterval(intervalId); // Menghentikan setInterval setelah 2 detik
				// 	$("#modal-vote").modal("hide");
				// 	hasilVote(atlitId, rondeId);
				// 	getData();
				// }, 5000);
				$("#closeVote").on("click", function () {
					closeVote(intervalId, atlitId, rondeId);
				});
			},
		});
	}

	function closeVote(intervalId, atlitId, rondeId) {
		clearInterval(intervalId); // Menghentikan setInterval setelah 2 detik
		hasilVote(atlitId, rondeId);
		// console.log('close')
		// getData();
	}

	function getDataVote() {
		$.ajax({
			type: "GET",
			url: "datavotedewan",
			async: false,
			dataType: "json",
			success: function (data) {
				var html = "";
				var i;
				for (i = 0; i < data.length; i++) {
					html +=
						"<tr>" +
						"<th class='text-center ";
					if (data[i].juri_1 == 'y') {
						html += "bg-blue";
					} else if (data[i].juri_1 == 'n') {
						html += "bg-red";
					} else if (data[i].juri_1 == 'kosong') {
						html += "bg-orange";
					}
					html +=
						"' style='padding: 2rem; vertical-align: middle;'>Juri 1</th>" +
						"<th class='text-center ";
					if (data[i].juri_2 == 'y') {
						html += "bg-blue";
					} else if (data[i].juri_2 == 'n') {
						html += "bg-red";
					} else if (data[i].juri_2 == 'kosong') {
						html += "bg-orange";
					}
					html +=
						"' style='padding: 2rem; vertical-align: middle;'>Juri 2</th>" +
						"<th class='text-center ";
					if (data[i].juri_3 == 'y') {
						html += "bg-blue";
					} else if (data[i].juri_3 == 'n') {
						html += "bg-red";
					} else if (data[i].juri_3 == 'kosong') {
						html += "bg-orange";
					}
					html +=
						"' style='padding: 2rem; vertical-align: middle;'>Juri 3</th>" +
						"</tr>";
				}
				$("#getDataVote").html(html);
			},
		});
	}

	function hasilVote(atlitId, rondeId) {
		$.ajax({
			type: "POST",
			url: "hasilvotedewan",
			data: {
				atlit_id: atlitId,
				ronde_id: rondeId
			},
			dataType: "json",
			success: function (data) {
				console.log("data ok");
			},
		});
	}



	function hapusNilai(atlitId) {

		console.log(atlitId);
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
					url: "hapusnilaidewan",
					data: {
						atlit_id: atlitId
					},
					success: function () {
						window.location.reload();
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
