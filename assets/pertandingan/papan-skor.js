$(document).ready(function () {
    getData();
    var base_url = window.location.origin;
    setInterval(function () {
        getDataVote();
    }, 1000);

    function resetBinButtons() {
        $("#bin_m1").removeClass("bg-red bg-green");
        $("#bin_m2").removeClass("bg-red bg-green");
    }

    $(document).on("click", "#ronde_btn", function () {
        let rondeId = $(this).attr("ronde-id");
        let newUrl = window.location.href.split('?')[0] + '?id=1&ronde-id=' + rondeId;

        // Mengganti URL saat ini dengan URL baru
        window.location.replace(newUrl);

        resetBinButtons();
        getData();
    });

    function getData() {
        let queryString = window.location.search;
        let urlParams = new URLSearchParams(queryString);

        let id = urlParams.get('id')
        let rondeId = urlParams.get('ronde-id')

        $.ajax({
            type: "POST",
            url: "datanilaiskor",
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

                    getRonde(id, rondeId);
                    
                    var tim_merah_id = data[i].tim_merah_id;
                    var tim_biru_id = data[i].tim_biru_id;
                    setInterval(function () {
                        updateIconBinaanMerah(tim_merah_id, rondeId);
                        updateIconBinaanBiru(tim_biru_id, rondeId);

                        updateIconTeguranMerah(tim_merah_id, rondeId);
                        updateIconTeguranBiru(tim_biru_id, rondeId);

                        updateIconPeringatanMerah(tim_merah_id, id);
                        updateIconPeringatanBiru(tim_biru_id, id);

                        getNilaiMerah(tim_merah_id, rondeId, id);
                        getNilaiBiru(tim_biru_id, rondeId, id);

                        getTombolJuri();
                    }, 1000);
                    
                }
            },
        });
    }

    function getRonde(partai_id, ronde_id) {
        $.ajax({
            type: "POST",
            url: "datarondeskor",
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
                        "<td class='text-center ";
                    if (ronde_id == data[i].ronde_id) {
                        html += "bg-navy";
                    }
                    html +=
                        "' id='ronde_btn' ronde-id='" +
                        data[i].ronde_id +
                        "' style='cursor: pointer; vertical-align: middle;";
                    if (ronde_id == data[i].ronde_id) {
                        html += "font-size: 5rem; font-weigth: bold;";
                    }
                    html +=
                        "'>" +
                        "<strong>" +
                        "<span id='ronde'>";
                        if (ronde_id == data[i].ronde_id) {
                            html += "<span style='font-size: 2rem;'>Ronde</span><br>";
                        } else {
                            html += "<span>Ronde</span><br>";
                        }
                    html +=
                        data[i].ronde +
                        "</span>" +
                        "</strong>" +
                        "</td>" +
                        "</tr>";
                }
                $("#loadRonde").html(html);
            },
        });
    }

    function updateIconBinaanMerah(atlit_id, ronde_id) {
        $.ajax({
            type: "POST",
            url: "datahukumanskor",
            data: {
                ronde_id: ronde_id,
                atlit_id: atlit_id,
                nilai_id: 6
            },
            dataType: "json",
            success: function (data) {
                // console.log("nilai binaan merah = " + data.length);
                let i;
                if (data.length <= 0) {
                    $("#bin_m1").attr("src", base_url + "/dist/img/Binaan1.png");
                } else {
                    for (i = 0; i < data.length; i++) {
                        let nilai = 0; // Inisialisasi nilai di luar perulangan
                        if (data.length > 0) {
                            nilai = data[0].nilai; // Ambil nilai hanya jika ada data
                        }

                        if (nilai >= 1) {
                            $("#bin_m1").attr("src", base_url + "/dist/img/BinaanMerah1.png");
                        } else {
                            $("#bin_m1").attr("src", base_url + "/dist/img/Binaan1.png");
                        }

                        if (nilai >= 2 && nilai % 2 === 0) {
                            $("#bin_m2").attr("src", base_url + "/dist/img/BinaanMerah2.png");
                        } else {
                            $("#bin_m2").attr("src", base_url + "/dist/img/Binaan2.png");
                        }
                    }
                }
            },
        });
    }

    function updateIconBinaanBiru(atlit_id, ronde_id) {
        $.ajax({
            type: "POST",
            url: "datahukumanskor",
            data: {
                ronde_id: ronde_id,
                atlit_id: atlit_id,
                nilai_id: 6
            },
            dataType: "json",
            success: function (data) {
                let i;
                if (data.length <= 0) {
                    $("#bin_b1").attr("src", base_url + "/dist/img/Binaan1.png");
                } else {
                    for (i = 0; i < data.length; i++) {
                        let nilai = 0; // Inisialisasi nilai di luar perulangan
                        if (data.length > 0) {
                            nilai = data[0].nilai; // Ambil nilai hanya jika ada data
                        }

                        if (nilai >= 1) {
                            $("#bin_b1").attr("src", base_url + "/dist/img/BinaanMerah1.png");
                        } else {
                            $("#bin_b1").attr("src", base_url + "/dist/img/Binaan1.png");
                        }

                        if (nilai >= 2 && nilai % 2 === 0) {
                            $("#bin_b2").attr("src", base_url + "/dist/img/BinaanMerah2.png");
                        } else {
                            $("#bin_b2").attr("src", base_url + "/dist/img/Binaan2.png");
                        }
                    }
                }
            },
        });
    }

    function updateIconTeguranMerah(atlit_id, ronde_id) {
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
                    $("#teg_m1").attr("src", base_url + "/dist/img/Teguran1.png");
                } else {
                    for (i = 0; i < data.length; i++) {
                        let nilai = 0; // Inisialisasi nilai di luar perulangan
                        if (data.length > 0) {
                            nilai = data[0].nilai; // Ambil nilai hanya jika ada data
                        }

                        if (nilai >= 1) {
                            $("#teg_m1").attr("src", base_url + "/dist/img/TeguranMerah1.png");
                        } else {
                            $("#teg_m1").attr("src", base_url + "/dist/img/Teguran1.png");
                        }

                        if (nilai >= 2) {
                            $("#teg_m2").attr("src", base_url + "/dist/img/TeguranMerah2.png");
                        } else {
                            $("#teg_m2").attr("src", base_url + "/dist/img/Teguran2.png");
                        }
                    }
                }
            },
        });
    }

    function updateIconTeguranBiru(atlit_id, ronde_id) {
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
                    $("#teg_b1").attr("src", base_url + "/dist/img/Teguran1.png");
                } else {
                    for (i = 0; i < data.length; i++) {
                        let nilai = 0; // Inisialisasi nilai di luar perulangan
                        if (data.length > 0) {
                            nilai = data[0].nilai; // Ambil nilai hanya jika ada data
                        }

                        if (nilai >= 1) {
                            $("#teg_b1").attr("src", base_url + "/dist/img/TeguranMerah1.png");
                        } else {
                            $("#teg_b1").attr("src", base_url + "/dist/img/Teguran1.png");
                        }

                        if (nilai >= 2) {
                            $("#teg_b2").attr("src", base_url + "/dist/img/TeguranMerah2.png");
                        } else {
                            $("#teg_b2").attr("src", base_url + "/dist/img/Teguran2.png");
                        }
                    }
                }
            },
        });
    }

    function updateIconPeringatanMerah(atlit_id, partai_id) {
        $.ajax({
            type: "POST",
            url: "dataperingatanskor",
            data: {
                partai_id: partai_id,
                atlit_id: atlit_id,
                nilai_id: 4
            },
            dataType: "json",
            success: function (data) {
                let i;
                if (data.length <= 0) {
                    $("#per_m1").attr("src", base_url + "/dist/img/Peringatan.png");
                } else {
                    for (i = 0; i < data.length; i++) {
                        if (data.length > 0) {
                            nilai = data[0].nilai; // Ambil nilai hanya jika ada data
                        }
                        if (nilai >= 1) {
                            $("#per_m1").attr("src", base_url + "/dist/img/PeringatanMerah.png");
                        } else {
                            $("#per_m1").attr("src", base_url + "/dist/img/Peringatan.png");
                        }

                        if (nilai >= 2) {
                            $("#per_m2").attr("src", base_url + "/dist/img/PeringatanMerah.png");
                        } else {
                            $("#per_m2").attr("src", base_url + "/dist/img/Peringatan.png");
                        }

                        if (nilai >= 3 && nilai % 3 === 0) {
                            $("#per_m3").attr("src", base_url + "/dist/img/PeringatanMerah.png");
                        } else {
                            $("#per_m3").attr("src", base_url + "/dist/img/Peringatan.png");
                        }
                    }
                }
            },
        });
    }

    function updateIconPeringatanBiru(atlit_id, partai_id) {
        $.ajax({
            type: "POST",
            url: "dataperingatanskor",
            data: {
                partai_id: partai_id,
                atlit_id: atlit_id,
                nilai_id: 4
            },
            dataType: "json",
            success: function (data) {
                let i;
                if (data.length <= 0) {
                    $("#per_b1").attr("src", base_url + "/dist/img/Peringatan.png");
                } else {
                    for (i = 0; i < data.length; i++) {
                        let nilai = 0; // Inisialisasi nilai di luar perulangan
                        if (data.length > 0) {
                            nilai = data[0].nilai; // Ambil nilai hanya jika ada data
                        }

                        if (nilai >= 1) {
                            $("#per_b1").attr("src", base_url + "/dist/img/PeringatanMerah.png");
                        } else {
                            $("#per_b1").attr("src", base_url + "/dist/img/Peringatan.png");
                        }

                        if (nilai >= 2) {
                            $("#per_b2").attr("src", base_url + "/dist/img/PeringatanMerah.png");
                        } else {
                            $("#per_b2").attr("src", base_url + "/dist/img/Peringatan.png");
                        }

                        if (nilai >= 3 && nilai % 3 === 0) {
                            $("#per_b3").attr("src", base_url + "/dist/img/PeringatanMerah.png");
                        } else {
                            $("#per_b3").attr("src", base_url + "/dist/img/Peringatan.png");
                        }
                    }
                }
            },
        });
    }

    function getNilaiMerah(atlit_id, ronde_id, partai_id) {
        $.ajax({
            type: "POST",
            url: "datatotalskor",
            data: {
                ronde_id: ronde_id,
                atlit_id: atlit_id,
                partai_id: partai_id
            },
            dataType: "json",
            success: function (data) {
                let nilai = data.nilai; // Mengambil nilai dari properti 'nilai' dalam objek
                $("#nilaiMerah").text(nilai);
            },
        });
    }

    function getNilaiBiru(atlit_id, ronde_id, partai_id) {
        $.ajax({
            type: "POST",
            url: "datatotalskor",
            data: {
                ronde_id: ronde_id,
                atlit_id: atlit_id,
                partai_id: partai_id
            },
            dataType: "json",
            success: function (data) {
                let nilai = data.nilai; // Mengambil nilai dari properti 'nilai' dalam objek
                $("#nilaiBiru").text(nilai);
            },
        });
    }

    function getTombolJuri(){
        $.ajax({
            type: "GET",
            url: "datatomboljuriskor",
            dataType: "json",
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var tombolId = data[i].tombol;
                    var tombolStatus = data[i].status;

                    if (tombolStatus === 'on') {
                        $("#" + tombolId).addClass("bg-olive"); // Menambahkan kelas untuk warna
                    } else {
                        $("#" + tombolId).removeClass("bg-olive"); // Menghapus kelas untuk warna
                    }
                }
            },
        });
    }

    function getDataVote() {
        $.ajax({
            type: "GET",
            url: "datavoteskor",
            async: false,
            dataType: "json",
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    if (data[i].id != null) {
                        if (data[i].nilai_id == 3) {
                            var vote = "Jatuhan";
                        } else {
                            var vote = "Pelanggaran";
                        }

                        if (data[i].sudut == "modal-merah") {
                            $("#title_merah").text(vote);
                        } else {
                            $("#title_biru").text(vote);
                        }
                        $("#vote_yb").attr("voteId", data[i].id);
                        $("#vote_ym").attr("voteId", data[i].id);
                        $("#vote_nb").attr("voteId", data[i].id);
                        $("#vote_nm").attr("voteId", data[i].id);

                        $("#vote_yb").attr("dataM", data[i].sudut);
                        $("#vote_ym").attr("dataM", data[i].sudut);
                        $("#vote_nb").attr("dataM", data[i].sudut);
                        $("#vote_nm").attr("dataM", data[i].sudut);
                        
                        $("#" + data[i].sudut).modal("show");
                        setInterval(function () {
                            getDataVoteJuri();
                        }, 1000);
                        
                    }
                }
            },
        });
    }

    function getDataVoteJuri() {
        $.ajax({
            type: "GET",
            url: "datavotedewan",
            async: false,
            dataType: "json",
            success: function (data) {
                var html = "";
                var i;
                for (i = 0; i < data.length; i++) {
                    var sudut = data[i].sudut;
                    html +=
                        "<tr>" +
                        "<th class='text-center ";
                    if (data[i].juri_1 == 'y') {
                        html += "bg-green";
                    } else if (data[i].juri_1 == 'n') {
                        html += "bg-red";
                    }
                    html +=
                        "' style='padding: 2rem; vertical-align: middle;'>Juri 1</th>" +
                        "<th class='text-center ";
                    if (data[i].juri_2 == 'y') {
                        html += "bg-green";
                    } else if (data[i].juri_2 == 'n') {
                        html += "bg-red";
                    }
                    html +=
                        "' style='padding: 2rem; vertical-align: middle;'>Juri 2</th>" +
                        "<th class='text-center ";
                    if (data[i].juri_3 == 'y') {
                        html += "bg-green";
                    } else if (data[i].juri_3 == 'n') {
                        html += "bg-red";
                    }
                    html +=
                        "' style='padding: 2rem; vertical-align: middle;'>Juri 3</th>" +
                        "</tr>";
                    
                    if(data[i].status == "close"){
                        $("#" + data[i].sudut).modal("hide");
                    }
                }

                if (sudut == "modal-merah") {
                    $("#getDataVoteM").html(html);
                } else {
                    $("#getDataVoteB").html(html);
                }
                
            },
        });
    }
});
